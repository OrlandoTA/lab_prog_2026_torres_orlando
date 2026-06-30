<?php

namespace app\core\models\dto;

use app\core\models\enums\CustomerProfile;

final class CustomerDto
{
    private int $id, $estado;

    private string $tipo;
    private string $apellido;
    private string $nombres;
    private string $dni;
    private string $razonSocial;
    private string $cuit;
    private string $telefono;
    private string $correo;
    private string $domicilio;
    private string $fechaAlta;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setTipo($data['tipo'] ?? '');
        $this->setApellido($data['apellido'] ?? '');
        $this->setNombres($data['nombres'] ?? '');
        $this->setDni($data['dni'] ?? '');
        $this->setRazonSocial($data['razonSocial'] ?? '');
        $this->setCuit($data['cuit'] ?? '');
        $this->setTelefono($data['telefono'] ?? '');
        $this->setCorreo($data['correo'] ?? '');
        $this->setDomicilio($data['domicilio'] ?? '');
        $this->setEstado($data['estado'] ?? 1);
        $this->setFechaAlta($data['fechaAlta'] ?? '');
    }

    /* ==========================
       GETTERS
       ========================== */

    public function getId(): int
    {
        return $this->id;
    }

    public function getEstado(): int
    {
        return $this->estado;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getNombres(): string
    {
        return $this->nombres;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function getRazonSocial(): string
    {
        return $this->razonSocial;
    }

    public function getCuit(): string
    {
        return $this->cuit;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function getDomicilio(): string
    {
        return $this->domicilio;
    }

    public function getFechaAlta(): string
    {
        return $this->fechaAlta;
    }

    /* ==========================
       SETTERS
       ========================== */

    public function setId(int $id): void
    {
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setEstado(int $estado): void
    {
        $this->estado = ($estado === 0 || $estado === 1) ? $estado : 1;
    }

    public function setTipo(string $tipo): void
    {
        $tiposValidos = array_column(CustomerProfile::cases(), 'value');
        $this->tipo = in_array($tipo, $tiposValidos) ? $tipo : '';
    }

    public function setApellido(string $apellido): void
    {
        $apellido = trim($apellido);
        $this->apellido = strlen($apellido) <= 100 ? $apellido : '';
    }

    public function setNombres(string $nombres): void
    {
        $nombres = trim($nombres);
        $this->nombres = strlen($nombres) <= 100 ? $nombres : '';
    }

    public function setDni(string $dni): void
    {
        $dni = trim($dni);
        $this->dni = strlen($dni) <= 15 ? $dni : '';
    }

    public function setRazonSocial(string $razonSocial): void
    {
        $razonSocial = trim($razonSocial);
        $this->razonSocial = strlen($razonSocial) <= 150 ? $razonSocial : '';
    }

    public function setCuit(string $cuit): void
    {
        $cuit = trim($cuit);
        $this->cuit = strlen($cuit) <= 20 ? $cuit : '';
    }

    public function setTelefono(string $telefono): void
    {
        $telefono = trim($telefono);
        $this->telefono = strlen($telefono) <= 30 ? $telefono : '';
    }

    public function setCorreo(string $correo): void
    {
        $correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
        $this->correo = $correo ? $correo : '';
    }

    public function setDomicilio(string $domicilio): void
    {
        $domicilio = trim($domicilio);
        $this->domicilio = strlen($domicilio) <= 200 ? $domicilio : '';
    }

    public function setFechaAlta(string $fechaAlta): void
    {
        $this->fechaAlta = (strlen($fechaAlta) === 10) ? $fechaAlta : "";
    }

    /* ==========================
       ARRAYS
       ========================== */

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'tipo' => $this->getTipo(),
            'apellido' => $this->getApellido(),
            'nombres' => $this->getNombres(),
            'dni' => $this->getDni(),
            'razonSocial' => $this->getRazonSocial(),
            'cuit' => $this->getCuit(),
            'telefono' => $this->getTelefono(),
            'correo' => $this->getCorreo(),
            'domicilio' => $this->getDomicilio(),
            'estado' => $this->getEstado(),
            'fechaAlta' => $this->getFechaAlta(),
        ];
    }

    public function toArrayForSave(): array
    {
        return [
            'tipo' => $this->getTipo(),
            'apellido' => $this->getApellido(),
            'nombres' => $this->getNombres(),
            'dni' => $this->getDni(),
            'razonSocial' => $this->getRazonSocial(),
            'cuit' => $this->getCuit(),
            'telefono' => $this->getTelefono(),
            'correo' => $this->getCorreo(),
            'domicilio' => $this->getDomicilio(),
        ];
    }
}

