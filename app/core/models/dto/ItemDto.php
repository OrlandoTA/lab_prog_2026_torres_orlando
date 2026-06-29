<?php

namespace app\core\models\dto;


final class ItemDto{

    private string  $nombre, $codigo, $descripcion;
    private int $id, $stock;
    private float $precio;
    private array $categorias;

    public function __construct(array $data = [])
    {
        $this->setNombre($data['nombre'] ?? '');
        $this->setCodigo($data['codigo']?? '');
        $this->setDescripcion($data['descripcion'] ?? '');
        $this->setCategorias($data['categorias'] ?? []);
        $this->setId($data['id'] ?? 0);
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
    
    public function getCategorias():array{
        return $this->categorias;
    }

    public function getStock(): int{
        return $this->stock;
    }



    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setcodigo(string $codigo): void{
        $this->codigo = ($codigo > 0) ? $codigo : 0;
    }

    public function setDescripcion(string $descripcion): void{
        $descripcionTrimeado = trim($descripcion);
        $this->descripcion = (strlen($descripcionTrimeado)>0 && strlen($descripcionTrimeado)<=900) ? $descripcionTrimeado: "";
    }

    public function setCategorias(array $categorias):void{
        $this->categorias = is_array($categorias) ? $categorias : [$categorias];
    }
    public function setNombre(string $nombre): void{
        $nombreTrimeado = trim($nombre);
        $this->nombre = (strlen($nombreTrimeado) > 0 && strlen($nombreTrimeado) <= 100) ? $nombreTrimeado : "";
    }

    public function setPrecio(float $precio): void{
        $this->precio = ($precio >= 0.0) ? $precio: 0;
    }


    public function setStock(string $stock): void{
      $this->stock = ($stock > 0)? $stock :  0;
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'nombre'   => $this->getNombre(),
            'stock'    => $this->getStock(),
            'precio'    => $this->getPrecio(),
            'descripcion'    => $this->getDescripcion(),
        ];
    }

    public function toArrayForSave(){
        return [
            'codigo'     => $this->getCodigo(), 
            'stock'  => $this->getStock(),
            'nombre'   => $this->getNombre(),
            'precio'    => $this->getPrecio(),
            'descripcion'    => $this->getDescripcion(),
        ];
    }

    public function toArrayForRelation(){
        return [
            'id' => $this->getId(),
            'categorias'  => $this->getCategorias(),
        ];
    }

}