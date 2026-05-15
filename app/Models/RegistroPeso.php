<?php

namespace App\Models;

/**
 * Modelo simple que representa un registro de peso.
 * Es el dato que se enviará a todos los observadores.
 */
class RegistroPeso
{
    public function __construct(
        public int $animalId,
        public float $pesoKg,
        public string $fecha
    ) {}
}