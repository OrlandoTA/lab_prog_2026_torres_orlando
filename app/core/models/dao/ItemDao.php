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

        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

    }

    public function searchId(string $codigo):array{
        $sql = "SELECT id FROM {$this->table} WHERE codigo =:codigo";
        $result = $this->selectQuery($sql, ['codigo' => $codigo]);

        return $result;
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
        if(!empty($filters['buscar'])){
            $condiciones[] = "(nombre LIKE :buscar OR descripcion LIKE :buscar OR codigo LIKE :buscar)";
            $parametros['buscar'] = "%" . $filters['buscar'] ."%";
        }

        $sql = "SELECT * FROM {$this->table}";

        if(!empty($condiciones)){
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
        if(!empty($filters['ordenar'])){
            switch($filters['ordenar']){
                case 'menor-precio':
                $sql .= " ORDER BY precio ASC";
                break;

                case 'mayor-precio':
                    $sql .= " ORDER BY precio DESC";
                    break;

                case 'nombre-ascendente':
                    $sql .= " ORDER BY nombre ASC";
                    break;

                case 'nombre-descendente':
                    $sql .= " ORDER BY nombre DESC";
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