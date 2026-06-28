<?php

namespace app\core\models\dao;
use PDO;
use app\core\models\dto\ItemDto;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class ItemDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "productos");
    }

    public function load(int $id): array{
        $sql = "SELECT nombre, descripcion, precio, stock FROM {$this->table} WHERE id = :id";
        return $this->selectQuery($sql, ['id' => $id]); 

        //$this->selectQuery($sql,[])
    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :nombre, :codigo, :descripcion, :precio, :stock)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

        $sql = "UPDATE {$this->table} SET  
                    nombre =:nombre,  
                    descripcion =:descripcion, 
                    precio =:precio, 
                    stock =:stock 
                WHERE id =:id";
        $this->updateQuery($sql, $data);
    }


  
    public function delete(int $id): void{

        $sql = "DELETE FROM {$this->table} WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

    }

    public function list(array $filters): array{
        return $this->searchByFilter($filters);
    }

    private function validateCodigo(int $id, string $codigo): void{
        $sql = "SELECT id FROM {$this->table} WHERE codigo = :codigo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'codigo' => $codigo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El codigo {$codigo} ya esta siendo usada por otro producto.");
        }
    }

    //Metodo para buscar con los filtros 
    private function searchByFilter(array $filters):array{


       $condiciones= [];
       $parametros = [];

        if(isset($filters['nombre'])){
            $parametros ['nombre'] = $filters['nombre'];
            $condiciones[] = "nombre = :nombre";
        }

        if(isset($filters['precio'])){
            $parametros ['precio'] = $filters['precio'];
            $condiciones[] = "precio = :precio";
        }

        if(isset($filters['stock'])){
            $parametros ['stock'] = $filters['stock'];
            $condiciones[] = "stock = :stock";
        }

        //Si los filtros estan vacios se envia toda la informacion de todos los productos
        if(empty($condiciones)){
            $sql = "SELECT * FROM productos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
           
        } else{
            $where = implode (" AND ", $condiciones);
             $sql = "SELECT * 
                    FROM {$this->table} 
                    WHERE $where ";
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute($parametros);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }




}