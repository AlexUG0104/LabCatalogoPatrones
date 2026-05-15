<?php

namespace App\Domain\Razas;

class Nelore extends Raza
{
    public function __construct()
    {
        parent::__construct('Nelore');
    }

    public function getDescripcion(): string
    {
        return 'Raza Nelore usada comúnmente para producción de carne.';
    }
}