<?php

namespace app\core\models\dto;




final class SaleDto{

    private string $formaPago, $fechaAlta;
    private int $id, $numeroVenta, $clienteId;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setNumeroVenta($data['numeroVenta'] ?? 0);
        $this->setFormaPago($data['formaPago'] ?? "");
        $this->setFecha($data['fecha'] ?? "");
        $this->setClienteId($data['clienteId'] ?? 0);
    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getNumeroVenta(): int{
        return $this->numeroVenta;
    }

    public function getFormaPago(): string{
        return $this->formaPago;
    }
    
    public function getClienteId(): int{
        return $this->clienteId;
    }

    public function getFecha(): string{
        return $this->fecha;
    }

    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setClienteId(int $clienteId): void{
        $this->clienteId = ($clienteId === 0 || $clienteId === 1) ? $clienteId : 0;
    }

    public function setNumeroVenta(int $numeroVenta): void{
        $this->numeroVenta = ($numeroVenta === 0 || $numeroVenta === 1) ? $numeroVenta : 1;
    }

    public function setFormaPago(string $formaPago): void{
        $pagoTrimeado = trim($formaPago);
        $this->formaPago = (strlen($pagoTrimeado) > 0 && strlen($pagoTrimeado) <= 100) ? $pagoTrimeado : "";
    }


    public function setFecha(string $fecha): void{
        $this->fecha = (strlen($fecha) === 10) ? $fecha : "";
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'numeroVenta'  => $this->getNumeroVenta(),
            'clienteId'   => $this->getClienteId(),
            'formaPago'    => $this->getFormaPago(),
            'fecha' => $this->getFecha(),

        ];
    }

    public function toArrayForSave(){
        return [
            'numeroVenta'  => $this->getNumeroVenta(),
            'clienteId'   => $this->getClienteId(),
            'formaPago'    => $this->getFormaPago(),
        ];
    }

}