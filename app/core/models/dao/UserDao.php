<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class UserDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "usuarios");
    }

    public function load(int $id): array{
        $sql = "SELECT nombres, apellido,cuenta, perfil FROM {$this->table} WHERE  id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute(['id' => $id]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function save(array $data): void{
        $this->validateCuenta(0, $data['cuenta']);
        $this->validateCorreo(0, $data['correo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, 1, NOW(), 0)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{
        $this->validateCuenta(0,$data['codigo']);
        $this->validateCorreo(0,$data['correo']);
        $sql = "UPDATE{$this->table} SET( apellido = :apellido, nombres  = :nombres, cuenta  = :cuenta, perfil  = :perfil,clave =:clave, correo =:correo, estado= :estado, fechaAlta= :fechaAlta, resetPass=  :resetPass) WHERE id=:id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }



    public function delete(int $id): void{
        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function list(array $filters): array{
        return searchByFilter($filters);
    }

    public function enable(UserDto $dto):void{
        $sql = "UPDATE{$this->table} SET estado = 1 WHERE id = :id";

        $stmt = $this->conn-prepare($sql);
        $stmt->execute(['id'=>$dto->getId()]);

    }

    public function disable(UserDto $dto):void{

        $sql = "UPDATE{$this->table} SET estado = 0 WHERE id = :id";
        
        $stmt = $this->conn-prepare($sql);
        $stmt->execute(['id' => $dto->getId()]);
    }

    public function reset(){
        $sql = "UPDATE{$this->table} SET resetPass = 1 where id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $dto->getId()]);
    }







    public  function validateCuenta(int $id, string $cuenta): void{
        $sql = "SELECT id FROM {$this->table} WHERE cuenta = :cuenta && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'cuenta' => $cuenta
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("La cuenta {$cuenta} ya esta siendo usada por otro usuario.");
        }
    }

    public function validateCorreo(int $id, string $correo): void{
        $sql = "SELECT id FROM {$this->table} WHERE correo = :correo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'correo' => $correo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El correo {$correo} ya esta siendo usado por otro usuario.");
        }
    }

    private function searchByFilter(array $filters){


       $condiciones= [];
       $parametros = [];

        if(isset($filters['nombres'])){
            $parametros ['nombres'] = $filters['nombres'];
            $condiciones[] = "nombres = :nombres";
        }

        if(isset($filters['apellido'])){
            $parametros ['apellido'] = $filters['apellido'];
            $condiciones[] = "apellido = :apellido";
        }

        if(isset($filters['perfil'])){
            $parametros ['perfil'] = $filters['perfil'];
            $condiciones[] = "perfil = :perfil";
        }

        //Si los filtros estan vacios se envia toda la informacion de todos los productos
        if(empty($condiciones)){
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
           
        } else{
            $where = implode(" AND ", $condiciones);
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