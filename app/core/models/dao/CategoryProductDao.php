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
        $stmt = $this->con->prepare($sql); 
        $stmt = $this->execute(['itemId'=>$itemId]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;

        //$this->selectQuery($sql,[])[0]
    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :itemId, :categoriaId)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

        $sql = "UPDATE {$this->table} 
            SET itemId = :itemId, 
            categoriaId = :categoriaId
        WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


    //Se elimina todas las relaciones que tiene un producto
    public function deleteByItemId(int $itemId): void{
        $sql = "DELETE FROM {$this->table} WHERE itemId = :itemId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['itemId' => $itemId]);

    }

    //Se elimina una determinada relacion que tiene un producto y una categoria
    public function deleteRelation(int $itemId, int $categoriaId):void{
        $sql = "DELETE FROM {$this->table} WHERE itemId = :itemId AND categoriaId = :categoriaId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'itemId' => $itemId,
            'categoriaId' => $categoriaId
        ]);
    }

}