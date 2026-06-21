<?php

namespace app\core\models\dto;

final class CategoryDto{

    private string $nombre;
    private int $id;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setNombres($data['nombre'] ?? "");

    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }



    public function getNombre(): string{
        return $this->nombre;
    }


    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }


    public function setNombre(string $nombre): void{
        $nombresTrimeado = trim($nombre);
        $this->nombre = (strlen($nombreTrimeado) > 0 && strlen($nombreTrimeado) <= 100) ? $nombreTrimeado : "";
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'nombre'   => $this->getNombre(),
        ];
    }

    public function toArrayForSave(){
        return [
            'nombre'   => $this->getNombre(),
        ];
    }

}