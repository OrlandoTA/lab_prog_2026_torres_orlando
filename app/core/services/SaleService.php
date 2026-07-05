<?php

namespace app\core\services;

use app\core\models\dto\CustomerDto;
use app\core\models\dao\CustomerDao;
use app\core\models\dao\ItemDao;
use app\core\models\dao\DetailSaleDao;
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

        //Se obtiene el id de la venta a traves de numero de venta
        $sale = $this->dao->searchId($dto->getNumeroVenta());

        $saleId = $sale[0]['id'];

        $detalleDao = new DetailSaleDao(Connection::get());
        $itemDao = new ItemDao(Connection::get());

        foreach ($dto->getDetalleS() as $item){
            $detalleDao->save([
                'ventaId' => $saleId,
                'productoId' => $item['itemId'],
                'cantidad' => $item['cantidad'],
                'precioUnitario' => $item['precio'],
                'subtotal' => $item['subtotal']

            ]);
            //SE ACTUALIZA EL STOCK DE LOS PRODUCTOS
       
            $itemDao->descountStock([
                'itemId'=>$item['itemId'],
                'cantidad'=>$item['cantidad'],
            ]);
        }            
    }


    public function load(SaleDto $dto):array{

        //Se guarda el resultado del saledao/load en una variable
        $sales = $this->dao->load($dto->getId());

        $sale = $sales[0];

        //Se hacew la coneccion del dao de los clientes
        $clienteDao = new CustomerDao(Connection::get());


        //Se obtiene los clientes y se manda por parametro el id del cliente
        $cliente = $clienteDao->load($sale['clienteId']);

        if (!empty($cliente)) {
            $sale['clienteNombre'] =
            $cliente[0]['apellido'] . ', ' . $cliente[0]['nombres'];
        }

        return [$sale];
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