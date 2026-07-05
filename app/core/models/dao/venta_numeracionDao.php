<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;
use PDO;


final class venta_numeracionDao extends BaseDao{


    public function __construct(\PDO $conn){
        parent::__construct($conn, 'ventas_numeracion');
    }

    public function count():void{
        $sql = 'UPDATE FROM {$this->table} SET ultimoNumero = ultimoNumero + 1';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute($sql);

    }

    //SE DECREMENTA EL CONTADOR SI UNA VENTA FUE CANCELADA
    public function deleteCount():void{
        $sql = 'UPDATE FROM {$this->table} SET ultimoNumero = ultimoNumero - 1';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute($sql);
    }

}


