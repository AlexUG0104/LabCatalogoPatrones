<?php

namespace App\Observers;

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;

/**
 * Concrete Observer
 *
 * Envía una notificación al propietario cuando se registra un peso.
 */
class NotificadorPropietario implements IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        echo "Notificando al propietario del animal {$registro->animalId}\n";
    }
}