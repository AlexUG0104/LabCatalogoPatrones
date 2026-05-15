<?php

namespace App\Strategies;

use App\Contracts\IAlgoritmoEstimacion;
use App\ValueObjects\ResultadoEstimacion;

/**
 * Concrete Strategy
 *
 * Estima el peso usando una fórmula simplificada
 * de regresión lineal.
 */
class AlgoritmoRegresionLineal implements IAlgoritmoEstimacion
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        $largo = $datosEntrada['largo_cm'] ?? 150;
        $alto = $datosEntrada['alto_cm'] ?? 120;

        $pesoEstimado = ($largo * 0.8) + ($alto * 1.5);

        return new ResultadoEstimacion(
            pesoKg: $pesoEstimado,
            confianzaPorcentaje: 75.0,
            metodoUsado: 'Regresión Lineal'
        );
    }
}