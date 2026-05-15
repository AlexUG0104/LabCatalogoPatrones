<?php

namespace App\Strategies;

use App\Contracts\IAlgoritmoEstimacion;
use App\ValueObjects\ResultadoEstimacion;

/**
 * Concrete Strategy
 *
 * Simula la estimación usando YOLOv8.
 */
class AlgoritmoYolov8 implements IAlgoritmoEstimacion
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        return new ResultadoEstimacion(
            pesoKg: 350.5,
            confianzaPorcentaje: 92.0,
            metodoUsado: 'YOLOv8'
        );
    }
}