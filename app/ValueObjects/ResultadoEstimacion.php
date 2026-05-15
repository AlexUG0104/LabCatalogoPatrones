<?php

namespace App\ValueObjects;

/**
 * Value Object
 *
 * Representa el resultado de una estimación.
 * Es inmutable porque sus propiedades son readonly.
 */
class ResultadoEstimacion
{
    public function __construct(
        public readonly float $pesoKg,
        public readonly float $confianzaPorcentaje,
        public readonly string $metodoUsado
    ) {}
}