<?php

namespace app\core\models\dao;
use PDO;
use app\core\models\dto\UserDto;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class UserDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "usuarios");
    }


    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        return $this->selectQuery($sql, ['id' => $id]);
        
        /*
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];*/
    }
    

    public function save(array $data): void{
        $this->validateCuenta(0, $data['cuenta']);
        $this->validateCorreo(0, $data['correo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, 1, NOW(), 0)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

        $this->validateCuenta($data['id'], $data['cuenta']);
        $this->validateCorreo($data['id'], $data['correo']);
    /*
        $sql = "UPDATE {$this->table}
            SET apellido = :apellido,
                nombres = :nombres,
                cuenta = :cuenta,
                perfil = :perfil,
                clave = :clave,
                correo = :correo,
                estado = :estado,
                fechaAlta = :fechaAlta,
                resetPass = :resetPass
            WHERE id = :id";*/

    if ($data['clave'] != "") {

        $sql = "UPDATE usuarios
                SET apellido = :apellido,
                    nombres = :nombres,
                    cuenta = :cuenta,
                    perfil = :perfil,
                    clave = :clave,
                    correo = :correo,
                    estado = :estado,
                    fechaAlta = :fechaAlta,
                    resetPass = :resetPass
                WHERE id = :id";
    } else {
        unset($data['clave']);
        $sql = "UPDATE usuarios
            SET  apellido = :apellido,
                nombres = :nombres,
                cuenta = :cuenta,
                perfil = :perfil,
                correo = :correo,
                estado = :estado,
                fechaAlta = :fechaAlta,
                resetPass = :resetPass
            WHERE id = :id";
    }
        $this->updateQuery($sql, $data);
    }

    public function login(string $cuenta): array{

        $sql = "SELECT
                    user.id,
                    user.apellido,
                    user.nombres,
                    user.cuenta,
                    user.clave,
                    user.perfil,
                    user.estado,
                    user.resetPass
                FROM usuarios AS user
                WHERE (user.cuenta = :cuenta OR user.correo = :cuenta)";

        $result = $this->selectQuery($sql, [
            "cuenta" => $cuenta
        ]);

        if(count($result) !== 1){
            throw new \Exception("El nombre de usuario o la contraseña no coinciden.");
        }

        return $result[0];
    }

    public function updatePassword(array $data): void{
        $sql = "UPDATE {$this->table}";
        $sql .= " SET clave =:clave";
        $sql .= " WHERE id = :id";
        $this->updateQuery($sql, $data);
    }


    public function delete(int $id): void{
        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function list(array $filters): array{
        return $this->searchByFilter($filters);
    }

    public function enable(UserDto $dto): void{

        $sql = "UPDATE {$this->table}
                SET estado = 1
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $dto->getId()
        ]);
    }

  public function disable(UserDto $dto): void{
        $sql = "UPDATE {$this->table}
                SET estado = 0
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $dto->getId()
        ]);
    }

  public function reset(UserDto $dto): void{
        $sql = "UPDATE {$this->table}
                SET resetPass = 1
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $dto->getId()
        ]);
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

    //Metodo para buscar con los filtros 
    private function searchByFilter(array $filters):array{
       $condiciones= [];
       $parametros = [];
        if(!empty($filters['buscar'])){
            $condiciones[] = "(nombres LIKE :buscar OR cuenta LIKE :buscar OR perfil LIKE :buscar OR correo LIKE :buscar OR apellido LIKE :buscar)";
            $parametros['buscar'] = "%" . $filters['buscar'] ."%";
        }

        $sql = "SELECT * FROM {$this->table}";

        if(!empty($condiciones)){
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
        if(!empty($filters['ordenar'])){
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
        }
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}