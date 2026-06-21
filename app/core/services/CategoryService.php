<?php

namespace app\core\services;

use app\core\service\base\BaseService;
use app\core\models\dao\CategoryDao;
use app\libs\database\Connection;
use app\core\models\dto\CategoryDto;


//El servicio llama al dao 
//o Valida que se cumplan los requisitos en la vista sino excepcion
final class CategoryService extends BaseService{


    function __construct(){
        parent::__construct(new CategoryDao(Connection::get()));
    }
  

    public function save(CategoryDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    }


    public function load(CategoryDto $dto):array{
        return $this->dao-> load($dto->getId());
    }


    public function update(CategoryDto $dto): void{
        $this->validateForUpdate($dto);

        $this->dao-> update($dto->toArray());
    }


    public function delete(CategoryDto $dto):void{
        $this->validateForDelete($dto);

        $this->dao-> delete($dto->getId());
    }

    
    public function list(array $filters=[]):array{
        return $this->dao-> list($filters);
        
    }




    public function validate(CategoryDto $dto):void{



        if($dto ->getNombre()==""){
            throw new \Exception("El campo <strong>nombre</strong> es obligatorio");
        }
    }

    public function validateForUpdate(CategoryDto $dto){

        if($dto->getId() <= 0){
            throw new \Exception("La categoria no existe.");
        }

    }

    //Se verifica si el usuario existe antes de eliminarlo
    public function validateForDelete(CategoryDto $dto){
        
        if($dto->getId() <= 0){
            throw new \Exception("La categoria no existe.");
        }

        if(empty($this->dao->load($dto->getId()))){
          throw new \Exception("La categoria no existe.");  
        }
    }



}