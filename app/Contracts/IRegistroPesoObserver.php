<?php

namespace App\Contracts;

use App\Models\RegistroPeso;

/**
 * Observer (interfaz)
 *
 * Define el contrato que deben cumplir todos los observadores.
 * Cada observador reaccionará cuando se registre un nuevo peso.
 */
interface IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void;
}