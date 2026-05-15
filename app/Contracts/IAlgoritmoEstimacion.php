<?php

namespace App\Contracts;

use App\ValueObjects\ResultadoEstimacion;

/**
 * Strategy (interfaz)
 *
 * Define el contrato común para todos los algoritmos
 * de estimación de peso.
 */
interface IAlgoritmoEstimacion
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion;
}