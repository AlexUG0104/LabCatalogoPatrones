<?php

namespace App\Observers;

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;

/**
 * Concrete Observer adicional.
 *
 * Demuestra que se puede agregar un nuevo observador
 * sin modificar el Subject.
 */
class AlertaSMS implements IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        echo "Enviando alerta SMS para el animal {$registro->animalId}\n";
    }
}