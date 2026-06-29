<?php

namespace app\core\models\dao;
use PDO;
use app\core\models\dto\ItemDto;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class CategoryProductDao extends BaseDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "items_categorias");
    }

    public function load(int $itemId): array{
        $sql = "SELECT categoriaId FROM {$this->table} WHERE itemId = :itemId";
        return $this->selectQuery($sql, ['itemId' => $itemId]);
    }

    public function save(array $data): void{
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :itemId, :categoriaId)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


    //Elimina una relacion de la tabla si es que el producto cambio de categoria
    public function deleteByItemId(int $itemId): void{
        $sql = "DELETE FROM {$this->table} WHERE itemId = :itemId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['itemId' => $itemId]);

    }


}