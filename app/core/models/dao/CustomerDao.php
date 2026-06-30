<?php

namespace app\core\models\dao;

use PDO;
use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class CustomerDao extends BaseDao implements InterfaceDao
{
    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "clientes");
    }

    public function load(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        return $this->selectQuery($sql, [
            'id' => $id
        ]);
    }

    public function save(array $data): void
    {
        $sql = "INSERT INTO {$this->table}
                (
                    tipo,
                    apellido,
                    nombres,
                    dni,
                    razonSocial,
                    cuit,
                    telefono,
                    correo,
                    domicilio,
                    fechaAlta
                )
                VALUES
                (
                    :tipo,
                    :apellido,
                    :nombres,
                    :dni,
                    :razonSocial,
                    :cuit,
                    :telefono,
                    :correo,
                    :domicilio,
                    NOW()
                )";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void
    {
        $sql = "UPDATE {$this->table}
                SET
                    tipo = :tipo,
                    apellido = :apellido,
                    nombres = :nombres,
                    dni = :dni,
                    razonSocial = :razonSocial,
                    cuit = :cuit,
                    telefono = :telefono,
                    correo = :correo,
                    domicilio = :domicilio,
                    estado = :estado,
                    fechaAlta =:fechaAlta
                WHERE id = :id";

        $this->updateQuery($sql, $data);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function list(array $filters): array
    {
        return $this->searchByFilter($filters);
    }

    private function searchByFilter(array $filters): array
    {
        $condiciones = [];
        $parametros = [];

        if (!empty($filters['buscar'])) {
            $condiciones[] = "(nombres LIKE :buscar
                            OR apellido LIKE :buscar
                            OR razonSocial LIKE :buscar
                            OR correo LIKE :buscar)";
            $parametros['buscar'] = "%" . $filters['buscar'] . "%";
        }

        if (!empty($filters['ordenar'])) {

            switch ($filters['ordenar']) {

                case 'tipo-empresa':
                    $condiciones[] = "tipo = 'Empresa'";
                    break;

                case 'tipo-particular':
                    $condiciones[] = "tipo = 'Particular'";
                    break;
            }

        }

        $sql = "SELECT * FROM {$this->table}";

        if (!empty($condiciones)) {
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }

        if (!empty($filters['ordenar'])) {

            switch ($filters['ordenar']) {

                case 'nombre-ascendente':
                    $sql .= " ORDER BY nombres ASC";
                    break;

                case 'nombre-descendente':
                    $sql .= " ORDER BY nombres DESC";
                    break;

                case 'razonSocial-ascendente':
                    $sql .= " ORDER BY razonSocial ASC";
                    break;

                case 'razonSocial-descendente':
                    $sql .= " ORDER BY razonSocial DESC";
                    break;
            }

        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateCorreo(int $id, string $correo): void
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE correo = :correo
                AND id <> :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'correo' => $correo
        ]);

        if ($stmt->rowCount() != 0) {
            throw new \Exception("El correo {$correo} ya está registrado.");
        }
    }

    public function validateDni(int $id, string $dni): void
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE dni = :dni
                AND id <> :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'dni' => $dni
        ]);

        if ($stmt->rowCount() != 0) {
            throw new \Exception("El DNI {$dni} ya está registrado.");
        }
    }

    public function validateCuit(int $id, string $cuit): void
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE cuit = :cuit
                AND id <> :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'cuit' => $cuit
        ]);

        if ($stmt->rowCount() != 0) {
            throw new \Exception("El CUIT {$cuit} ya está registrado.");
        }
    }
}