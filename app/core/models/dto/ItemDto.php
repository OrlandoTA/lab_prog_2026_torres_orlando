<?php

namespace app\core\models\dto;


final class ItemDto{

    private string  $nombre, $codigo, $descripcion;
    private int $id, $categoriaId, $stock;
    private float $precio;

    public function __construct(array $data = [])
    {
        $this->setNombre($data['nombre'] ?? '');
        $this->setCodigo($data['codigo']?? '');
        $this-> setDescripcion($data['descripcion'] ?? '');
        $this->setId($data['id'] ?? 0);
        $this->setCategoriaId($data['categoriaId'] ?? 0);
        $this->setStock($data['stock'] ?? 0);
        $this->setPrecio($data['precio'] ?? 0.0);
    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getCodigo(): string{
        return $this->codigo;
    }

    public function getDescripcion(): string{
        return $this->descripcion;
    }
    
    public function getNombre(): string{
        return $this->nombre;
    }

    public function getPrecio(): float{
        return $this->precio;
    }
    
    public function getCategoriaId(): int{
        return $this->categoriaId;
    }

    public function getStock(): int{
        return $this->stock;
    }



    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setcodigo(int $codigo): void{
        $this->codigo = ($codigo > 0) ? $codigo : 0;
    }

    public function setDescripcion(int $descripcion): void{
        $descripcionTrimeado = trim($descripcion);
        $this->descripcion = (strlen($descripcionTrimeado)>0 && strlen($nombreTrimeado)<=900) ? $nombreTrimeado: "";
    }


    public function setNombre(string $nombre): void{
        $nombreTrimeado = trim($nombre);
        $this->nombre = (strlen($nombreTrimeado) > 0 && strlen($nombreTrimeado) <= 100) ? $nombreTrimeado : "";
    }

    public function setPrecio(float $precio): void{
        $this->precio = ($precio >= 0.0) ? $precio: 0;
    }

    public function setCategoriaId(int $categoriaId): void{
       $this->$categoriaId = ($categoriaId > 0) ? $categoriaId : 0;
    }

    public function setStock(string $stock): void{
      $this->$stock = ($stock > 0)? $stock :  0;
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'categoriaId'  => $this->getCategoriaId(),
            'nombre'   => $this->getNombre(),
            'stock'    => $this->getStock(),
            'precio'    => $this->getPrecio(),
            'codigo'     => $this->getCodigo(),
            'descripcion'    => $this->getDescripcion(),
        ];
    }

    public function toArrayForSave(){
        return [
            'stock'  => $this->getStock(),
            'nombre'   => $this->getNombre(),
            'precio'    => $this->getPrecio(),
            'descripcion'    => $this->getDescripcion(),
            'categoriaId'     => $this->getCategoriaId(),
        ];
    }

}