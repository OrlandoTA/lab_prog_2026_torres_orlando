<?php

namespace app\core\models\dto;


final class SaleDto {

    private string $formaPago;
    private int $id, $clienteId;
    private string $numeroVenta;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setNumeroVenta($data['numeroVenta'] ?? "");
        $this->setFormaPago($data['formaPago'] ?? "");
        $this->setClienteId($data['clienteId'] ?? 0);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNumeroVenta(): string {
        return $this->numeroVenta;
    }

    public function getFormaPago(): string {
        return $this->formaPago;
    }

    public function getClienteId(): int {
        return $this->clienteId;
    }

    public function setId(int $id): void {
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setClienteId(int $clienteId): void {
        $this->clienteId = ($clienteId > 0) ? $clienteId : 0;
    }

    public function setNumeroVenta(string $numeroVenta): void {
        $this->numeroVenta = trim($numeroVenta);
    }

    public function setFormaPago(string $formaPago): void {
        $this->formaPago = trim($formaPago);
    }

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'numeroVenta' => $this->getNumeroVenta(),
            'clienteId' => $this->getClienteId(),
            'formaPago' => $this->getFormaPago(),
        ];
    }

    public function toArrayForSave(): array {
        return [
            'numeroVenta' => $this->getNumeroVenta(),
            'clienteId' => $this->getClienteId(),
            'formaPago' => $this->getFormaPago(),
        ];
    }
}