<?php

namespace app\core\models\dao;
use PDO;
use app\core\models\dto\SaleDto;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class SaleDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "ventas");
    }


    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        return $this->selectQuery($sql, ['id' => $id]);
        

    }
    

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :numeroVenta, NOW(), :clienteId, :formaPago)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

        $sql = "UPDATE {$this->table}
            SET numeroVenta = :numeroVenta,
                formaPago = :formaPago,
                fecha = :fecha,
                perfil = :perfil,
            WHERE id = :id";
        $this->updateQuery($sql, $data);
    }




    public function delete(int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function list(array $filters): array{
        return $this->searchByFilter($filters);
    }




    //Metodo para buscar con los filtros 
    private function searchByFilter(array $filters):array{
       $condiciones= [];
       $parametros = [];
        if(!empty($filters['buscar'])){
            $condiciones[] = "(numeroVenta LIKE :buscar OR formaPago LIKE :buscar)";
            $parametros['buscar'] = "%" . $filters['buscar'] ."%";
        }

        $sql = "SELECT * FROM {$this->table}";

        if(!empty($condiciones)){
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
        /*if(!empty($filters['ordenar'])){
            switch($filters['ordenar']){
                case 'tipo-Administrador':
                $sql .= " WHERE perfil = 'Administrador'";
                break;

                case 'tipo-operador':
                    $sql .= " WHERE perfil = 'Operador'";
                break;

                case 'nombre-ascendente':
                    $sql .= " ORDER BY nombres ASC";
                break;

                case 'nombre-descendente':
                    $sql .= " ORDER BY nombres DESC";
                break;

                default:
                break;
            }
        }*/
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}