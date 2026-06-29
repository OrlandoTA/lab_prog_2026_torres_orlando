<?php

namespace app\core\services;
use app\core\models\dao\CategoryProductDao;
use app\core\services\base\BaseService;
use app\core\models\dao\ItemDao;
use app\libs\database\Connection;
use app\core\models\dto\ItemDto;


//El servicio llama al dao en list 
final class ItemService extends BaseService{

    function __construct(){
        parent::__construct(new ItemDao(connection::get()));
    }

    public function save(ItemDto $dto): void{
        $this -> validate($dto);

        //Se guarda el producto
        $this -> dao->save($dto->toArrayForSave());
        
        //Se obtiene el id del producto a traves de su codigo(ISBN)
        $item = $this->dao->searchId($dto->getCodigo());

        $itemId = $item[0]['id'];


        $relacionDao = new CategoryProductDao(Connection::get());
        
        foreach ($dto->getCategorias() as $categoriaId) {

            $relacionDao->save([
                'itemId' => $itemId,
                'categoriaId' => $categoriaId
            ]);
        }
    }


    public function load(ItemDto $dto):array{
        $itemId = $dto->getId();
        $item = $this -> dao -> load($itemId); 

        $relacionDao = new CategoryProductDao(Connection::get());
        $categorias = $relacionDao->load($itemId);
        
        //Se agrega en el array de data un nuevo arreglo de las categorias obtenidas de la relacion
        $item[0]['categorias'] = array_column($categorias, 'categoriaId');
        return $item;
        
    }


    public function update(ItemDto $dto): void{
        $this->validateForUpdate($dto);
        $this->dao->update($dto->toArray());

        $itemId = $dto->getId();
        $relacionDao = new CategoryProductDao(Connection::get());

        $relacionDao->deleteByItemId($itemId);
        
        foreach ($dto->getCategorias() as $categoriaId) {

            $relacionDao->save([
                'itemId' => $itemId,
                'categoriaId' => $categoriaId
            ]);
        }
    }

    public function delete(ItemDto $dto):void{
        $this->validateForDelete($dto);

        $this->dao->delete($dto->getId());
    } 

    public function list(array $filters):array{
        return $this->dao->list($filters);
    }


    public function validate(ItemDto $dto):void{

        //Validacion de apellido
        if($dto -> getNombre() == ""){//Si el apellido es igual a vacio se tira una excepcion
            throw new \Exception("El campo <strong>apellido</strong> es obligatorio");
        }

        if($dto -> getDescripcion() == ""){//Si el apellido es igual a vacio se tira una excepcion
            throw new \Exception("El campo <strong>descripcion</strong> es obligatorio");
        }

        if($dto -> getStock() < 0){//Si el apellido es igual a vacio se tira una excepcion
            throw new \Exception("El campo <strong>stock</strong> no puede ser menor cero");
        }

        if($dto -> getCodigo() == ""){//Si el apellido es igual a vacio se tira una excepcion
            throw new \Exception("El campo <strong>codigo</strong> es obligatorio");
        }

        if($dto -> getPrecio() < 0){
             throw new \Exception("El campo <strong>precio</strong> el precio no puede ser menor a cero");
        }
    }

    public function validateForUpdate(ItemDto $dto){

        if($dto->getId() <= 0){
            throw new \Exception("El producto no existe.");
        }

    }

    //Se verifica si el usuario existe antes de eliminarlo
    public function validateForDelete(ItemDto $dto){
        
        if($dto->getId() <= 0){
            throw new \Exception("El producto no existe.");
        }

        if(empty($this->dao->load($dto->getId()))){
          throw new \Exception("El producto no existe.");  
        }
    }
}