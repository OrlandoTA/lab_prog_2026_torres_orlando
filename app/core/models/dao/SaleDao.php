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
    

    public function save(array $data): void {

        $sql = "INSERT INTO {$this->table}
                (numeroVenta, fecha, clienteId, formaPago)
                VALUES (:numeroVenta, :fecha, :clienteId, :formaPago)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void {

        $sql = "UPDATE {$this->table}
                SET numeroVenta = :numeroVenta,
                    clienteId = :clienteId,
                    formaPago = :formaPago,
                    fecha = :fecha
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
            $condiciones[] = "(numeroVenta LIKE :buscar OR formaPago LIKE :buscar OR clienteId LIKE :buscar)";
            $parametros['buscar'] = "%" . $filters['buscar'] ."%";
        }
    
    if (!empty($filters['fecha_inicio']) && empty($filters['fecha_fin'])) {
        $condiciones[] = "fecha >= :fecha_inicio";
        $parametros['fecha_inicio'] = $filters['fecha_inicio'];
    }

    
    if (!empty($filters['fecha_fin']) && empty($filters['fecha_inicio'])) {
        $condiciones[] = "fecha <= :fecha_fin";
        $parametros['fecha_fin'] = $filters['fecha_fin'];
    }

    
    if (!empty($filters['fecha_inicio']) && !empty($filters['fecha_fin'])) {
        $condiciones[] = "fecha BETWEEN :fecha_inicio AND :fecha_fin";
        $parametros['fecha_inicio'] = $filters['fecha_inicio'];
        $parametros['fecha_fin'] = $filters['fecha_fin'];
    }

        $sql = "SELECT * FROM {$this->table}";

        if(!empty($condiciones)){
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
        if(!empty($filters['ordenar'])){
            switch($filters['ordenar']){
                case 'tipo-transferencia':
                $sql .= " WHERE formaPago = 'Transferencia'";
                break;

                case 'tipo-debito':
                    $sql .= " WHERE formaPago = 'Debito'";
                break;
                case 'tipo-credito':
                    $sql .= " WHERE formaPago = 'Credito'";
                break;
                case 'tipo-efectivo':
                    $sql .= " WHERE formaPago = 'Efectivo'";
                break;

                default:
                break;
            }
        }
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}