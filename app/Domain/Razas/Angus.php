<?php

namespace App\Domain\Razas;

class Angus extends Raza
{
    public function __construct()
    {
        parent::__construct('Angus');
    }

    public function getDescripcion(): string
    {
        return 'Raza Angus reconocida por su calidad de carne.';
    }
}