<?php

namespace app\core\services;

use app\core\services\base\BaseService;
use app\core\models\dao\CustomerDao;
use app\libs\database\Connection;
use app\core\models\dto\CustomerDto;


//El servicio llama al dao 
//o Valida que se cumplan los requisitos en la vista sino excepcion
final class CustomerService extends BaseService{


    function __construct(){
        parent::__construct(new CustomerDao(Connection::get()));
    }
  

    public function save(CustomerDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    }


    public function load(CustomerDto $dto):array{
        return $this->dao->load($dto->getId());
    }


    public function update(CustomerDto $dto): void{
        $this->validateForUpdate($dto);

        $this->dao-> update($dto->toArray());
    }


    public function delete(CustomerDto $dto):void{
        $this->validateForDelete($dto);

        $this->dao-> delete($dto->getId());
    }

    
    public function list(array $filters):array{
        return $this->dao-> list($filters);
        
    }

    public function search(String $buscar):array{
        return $this->dao->search($buscar);
    }




    public function validate(CustomerDto $dto): void
    {
        if ($dto->getTipo() == "") {
            throw new \Exception("El campo <strong>Tipo</strong> es obligatorio.");
        }

        if ($dto->getTipo() == "Particular") {

            if ($dto->getApellido() == "") {
                throw new \Exception("El campo <strong>Apellido</strong> es obligatorio.");
            }

            if ($dto->getNombres() == "") {
                throw new \Exception("El campo <strong>Nombres</strong> es obligatorio.");
            }

            if ($dto->getDni() == "") {
                throw new \Exception("El campo <strong>DNI</strong> es obligatorio.");
            }

        } else {

            if ($dto->getRazonSocial() == "") {
                throw new \Exception("El campo <strong>Razón Social</strong> es obligatorio.");
            }

            if ($dto->getCuit() == "") {
                throw new \Exception("El campo <strong>CUIT</strong> es obligatorio.");
            }
        }

        if ($dto->getTelefono() == "") {
            throw new \Exception("El campo <strong>Teléfono</strong> es obligatorio.");
        }

        if ($dto->getCorreo() == "") {
            throw new \Exception("El campo <strong>Correo</strong> es obligatorio.");
        }

        if ($dto->getDomicilio() == "") {
            throw new \Exception("El campo <strong>Domicilio</strong> es obligatorio.");
        }
    }


    public function validateForUpdate(CustomerDto $dto): void
    {
        if ($dto->getId() <= 0) {
            throw new \Exception("El cliente no existe.");
        }

        $this->dao->validateCorreo($dto->getId(), $dto->getCorreo());

        if ($dto->getTipo() == "Particular") {
            $this->dao->validateDni($dto->getId(), $dto->getDni());
        } else {
            $this->dao->validateCuit($dto->getId(), $dto->getCuit());
        }
    }

  public function validateForDelete(CustomerDto $dto): void
    {
        if ($dto->getId() <= 0) {
            throw new \Exception("El cliente no existe.");
        }

    }



}