<?php

namespace app\core\services;

use app\core\services\base\BaseService;
use app\core\models\dao\SaleDao;
use app\libs\database\Connection;
use app\core\models\dto\SaleDto;


//El servicio llama al dao 
//o Valida que se cumplan los requisitos en la vista sino excepcion
final class SaleService extends BaseService{


    function __construct(){
        parent::__construct(new SaleDao(Connection::get()));
    }
  

    public function save(SaleDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    }


    public function load(SaleDto $dto):array{
        return $this->dao->load($dto->getId());
    }


    public function update(SaleDto $dto): void{
        $this->validateForUpdate($dto);

        $this->dao-> update($dto->toArray());
    }


    public function delete(SaleDto $dto):void{
        $this->validateForDelete($dto);

        $this->dao-> delete($dto->getId());
    }

    
    public function list(array $filters):array{
        return $this->dao-> list($filters);
        
    }




    public function validate(SaleDto $dto): void {

        if ($dto->getNumeroVenta() == "") {
            throw new \Exception("El número de venta es obligatorio");
        }

        if ($dto->getClienteId() <= 0) {
            throw new \Exception("El cliente es obligatorio");
        }

        if ($dto->getFormaPago() == "") {
            throw new \Exception("La forma de pago es obligatoria");
        }
    }

    public function validateForUpdate(SaleDto $dto){

        if($dto->getId() <= 0){
            throw new \Exception("La venta no existe.");
        }

    }

    //Se verifica si el usuario existe antes de eliminarlo
    public function validateForDelete(SaleDto $dto){
        
        if($dto->getId() <= 0){
            throw new \Exception("El Venta no existe.");
        }
    }



}