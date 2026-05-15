<?php

// Cargar manualmente las clases necesarias
require_once __DIR__ . '/../Contracts/IRegistroPesoObserver.php';
require_once __DIR__ . '/../Models/RegistroPeso.php';
require_once __DIR__ . '/../Observers/RegistroPesoSubject.php';

use App\Contracts\IRegistroPesoObserver;
use App\Models\RegistroPeso;
use App\Observers\RegistroPesoSubject;

/**
 * Spy Observer
 *
 * Observador falso para verificar si fue notificado.
 */
class SpyObserver implements IRegistroPesoObserver
{
    public bool $fueLlamado = false;

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->fueLlamado = true;
    }
}

// Crear el Subject
$subject = new RegistroPesoSubject();

// Crear tres observadores espía
$observer1 = new SpyObserver();
$observer2 = new SpyObserver();
$observer3 = new SpyObserver();

// Suscribir observadores
$subject->suscribir($observer1);
$subject->suscribir($observer2);
$subject->suscribir($observer3);

// Crear un registro de peso
$registro = new RegistroPeso(
    animalId: 1,
    pesoKg: 350.5,
    fecha: '2026-05-15'
);

// Ejecutar la notificación
$subject->registrarPeso($registro);

// Verificar que todos fueron llamados
assert($observer1->fueLlamado === true);
assert($observer2->fueLlamado === true);
assert($observer3->fueLlamado === true);

echo "Prueba correcta: todos los observadores fueron notificados.\n";