<?php

namespace App\Observers;

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;

/**
 * Concrete Observer
 *
 * Envía la información a SENASA mediante un webhook.
 */
class WebhookSenasa implements IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        echo "Enviando webhook a SENASA para el animal {$registro->animalId}\n";
    }
}