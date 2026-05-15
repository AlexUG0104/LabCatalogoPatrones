<?php

namespace App\Observers;

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;

/**
 * Concrete Observer
 *
 * Recalcula el índice de condición corporal (ICC).
 */
class RecalculadorICC implements IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        echo "Recalculando ICC para el animal {$registro->animalId}\n";
    }
}