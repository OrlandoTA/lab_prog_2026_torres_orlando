<?php

namespace app\core\services;

use app\core\services\base\BaseService;
use app\core\models\dao\UserDao;
use app\libs\database\Connection;
use app\core\models\dto\UserDto;


//El servicio llama al dao 
//o Valida que se cumplan los requisitos en la vista sino excepcion
final class UserService extends BaseService{


    function __construct(){
        parent::__construct(new UserDao(Connection::get()));
    }
  

    public function save(UserDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    }


    public function load(UserDto $dto):array{
        return $this->dao->load($dto->getId());
    }


    public function update(UserDto $dto): void{
        $this->validateForUpdate($dto);

        $this->dao-> update($dto->toArray());
    }


    public function delete(UserDto $dto):void{
        $this->validateForDelete($dto);

        $this->dao-> delete($dto->getId());
    }
    public function updatePass(UserDto $dto):void{
        $this->validateForUpdatePass($dto);
        
        $this->dao-> reset($dto->getId());
        $this->dao-> updatePassword($dto->toUpdatePass());
    }

    
    public function list(array $filters):array{
        return $this->dao-> list($filters);
        
    }




    public function validate(UserDto $dto):void{

        //Validacion de apellido
        if($dto -> getApellido() == ""){//Si el apellido es igual a vacio se tira una excepcion
            throw new \Exception("El campo <strong>apellido</strong> es obligatorio");
        }

        if($dto ->getNombres()==""){
            throw new \Exception("El campo <strong>nombre</strong> es obligatorio");
        }

        if($dto ->getCorreo() ==  ""){
            throw new \Exception("El campo <strong>correo</strong> es obligatorio");
        }

        if($dto ->getCuenta() ==  ""){
            throw new \Exception("El campo <strong>cuenta</strong> es obligatorio");
        }

        if($dto ->getPerfil() ==  ""){
            throw new \Exception("El campo <strong>perfil</strong> es obligatorio");
        }
        
        if($dto ->getClave() ==  ""){
            throw new \Exception("El campo <strong>clave</strong> es obligatorio");
        }
    }

    public function validateForUpdate(UserDto $dto){

        if($dto->getId() <= 0){
            throw new \Exception("El usuario no existe.");
        }

        $this->dao->validateCorreo($dto->getId(), $dto->getCorreo());

        $this->dao->validateCuenta($dto->getId(), $dto->getCuenta());
    }

    public function validateForUpdatePass(UserDto $dto){
         if($dto->getId() <= 0){
            throw new \Exception("El usuario no existe.");
        }
    }

    //Se verifica si el usuario existe antes de eliminarlo
    public function validateForDelete(UserDto $dto){
        
        if($dto->getId() <= 0){
            throw new \Exception("El usuario no existe.");
        }

        if(empty($this->dao->load($dto->getId()))){
          throw new \Exception("El usuario no existe.");  
        }
    }



}