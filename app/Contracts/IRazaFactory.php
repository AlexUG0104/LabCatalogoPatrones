<?php

namespace App\Contracts;

use App\Domain\Razas\Raza;

interface IRazaFactory
{
    public function create(string $nombreRaza): Raza;
}