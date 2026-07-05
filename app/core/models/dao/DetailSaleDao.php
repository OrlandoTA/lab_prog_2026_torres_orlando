<?php

namespace app\core\models\dao;


use PDO;
use app\core\models\DetailSaleDto;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;


final class DetailSaleDao extends BaseDao{

    public function __construct(\PDO $conn){
        parent::__construct($conn, "ventas_detalle");
    }



    public function save(array $data):void{
        $sql = "INSERT INTO {$this->table} 
            VALUES (DEFAULT, :ventaId, :productoId, :cantidad, :precioUnitario, :subtotal)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


}