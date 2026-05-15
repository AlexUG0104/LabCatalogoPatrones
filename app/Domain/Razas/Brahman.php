<?php

namespace App\Domain\Razas;

class Brahman extends Raza
{
    public function __construct()
    {
        parent::__construct('Brahman');
    }

    public function getDescripcion(): string
    {
        return 'Raza Brahman adaptada a climas calientes.';
    }
}