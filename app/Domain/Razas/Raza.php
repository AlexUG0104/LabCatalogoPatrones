<?php

namespace App\Domain\Razas;

abstract class Raza
{
    public function __construct(
        protected string $nombre
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    abstract public function getDescripcion(): string;
}