<?php

namespace app\core\services;

use app\core\service\base\BaseService;
use app\core\models\dao\ItemDao;
use app\libs\database\Conecction;
use app\core\models\dto\ItemDto;


//El servicio llama al dao en list 
final class ItemSerice extends BaseService{

    function __construct(){
        parent::__construct(new ItemDao(connection::get()));
    }

    public function save(ItemDto $dto): void{
        $this -> validate($dto);
        $this -> dao->save($dto->toArrayForSave());
    }

    public function load(ItemDto $dto):array{
        return $this -> dao -> load($dto->getId());
    }


    public function update(ItemDto $dto): void{
        $this->validateForUpdate($dto);
        $this -> dao -> update($dto->toArray());
    }

    public function delete(ItemDto $dto):void{
        $this->validateForDelete($dto);

        $this -> dao -> delete($dto->getId());
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