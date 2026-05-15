<?php

namespace App\Factories;

use App\Contracts\IRazaFactory;
use App\Domain\Razas\Raza;
use App\Domain\Razas\Brahman;
use App\Domain\Razas\Nelore;
use App\Domain\Razas\Angus;

class RazaFactory implements IRazaFactory
{
    private array $razas = [
        'brahman' => Brahman::class,
        'nelore' => Nelore::class,
        'angus' => Angus::class,
    ];

    public function create(string $nombreRaza): Raza
    {
        $clave = strtolower($nombreRaza);

        if (!isset($this->razas[$clave])) {
            throw new \InvalidArgumentException("Raza no soportada: {$nombreRaza}");
        }

        $clase = $this->razas[$clave];

        return new $clase();
    }
}