<?php

namespace App\Strategies;

use App\Contracts\IAlgoritmoEstimacion;
use App\ValueObjects\ResultadoEstimacion;

/**
 * Concrete Strategy
 *
 * Estima el peso usando valores aproximados
 * según la raza del animal.
 */
class AlgoritmoTablaReferencia implements IAlgoritmoEstimacion
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        $raza = strtolower($datosEntrada['raza'] ?? 'brahman');

        $tabla = [
            'brahman' => 350,
            'nelore' => 330,
            'angus' => 370,
        ];

        $pesoEstimado = $tabla[$raza] ?? 300;

        return new ResultadoEstimacion(
            pesoKg: $pesoEstimado,
            confianzaPorcentaje: 60.0,
            metodoUsado: 'Tabla de Referencia'
        );
    }
}