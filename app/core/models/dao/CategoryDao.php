<?php

namespace app\core\models\dao;
use PDO;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class CategoryDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "categorias");
    }

    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
    
    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :nombre)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

        $sql = "UPDATE {$this->table}
                SET
                    nombre = :nombre,
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


    public function delete(int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function list(array $filters = []): array{
        $sql = "SELECT * FROM {$this->table} ORDER BY nombre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 

}