<?php

namespace App\Services;

use App\Contracts\IAlgoritmoEstimacion;
use App\Strategies\AlgoritmoTablaReferencia;
use App\ValueObjects\ResultadoEstimacion;

/**
 * Context
 *
 * Esta clase no conoce los detalles del algoritmo.
 * Solo recibe una estrategia y la ejecuta.
 */
class EstimadorPesoService
{
    public function __construct(
        private IAlgoritmoEstimacion $algoritmo
    ) {}

    /**
     * Ejecuta la estrategia seleccionada.
     */
    public function estimar(array $datosEntrada): ResultadoEstimacion
    {
        return $this->algoritmo->ejecutar($datosEntrada);
    }

    /**
     * Demuestra un cambio de estrategia en tiempo de ejecución.
     * Si no hay conexión al servicio YOLOv8, usa tabla de referencia.
     */
    public function estimarConFallback(array $datosEntrada, bool $hayConexionYolov8): ResultadoEstimacion
    {
        if (!$hayConexionYolov8) {
            $this->algoritmo = new AlgoritmoTablaReferencia();
        }

        return $this->algoritmo->ejecutar($datosEntrada);
    }
}