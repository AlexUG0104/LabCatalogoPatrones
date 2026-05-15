<?php

namespace App\Observers;

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;

/**
 * Subject (Observable)
 *
 * Mantiene una lista de observadores y les notifica
 * cuando ocurre el evento "peso registrado".
 */
class RegistroPesoSubject
{
    /**
     * Lista de observadores suscritos.
     *
     * @var IRegistroPesoObserver[]
     */
    private array $observadores = [];

    /**
     * Suscribe un nuevo observador.
     */
    public function suscribir(IRegistroPesoObserver $observer): void
    {
        $this->observadores[] = $observer;
    }

    /**
     * Elimina un observador de la lista.
     */
    public function desuscribir(IRegistroPesoObserver $observer): void
    {
        foreach ($this->observadores as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observadores[$key]);
            }
        }
    }

    /**
     * Simula el registro de un peso y luego notifica a todos.
     */
    public function registrarPeso(RegistroPeso $registro): void
    {
        $this->notificar($registro);
    }

    /**
     * Recorre todos los observadores y ejecuta su reacción.
     */
    private function notificar(RegistroPeso $registro): void
    {
        foreach ($this->observadores as $observer) {
            $observer->onPesoRegistrado($registro);
        }
    }
}