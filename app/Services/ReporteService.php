<?php

namespace App\Services;

use App\Contracts\IAnimalRepository;

class ReporteService
{
    public function __construct(
        private IAnimalRepository $animalRepository
    ) {}

    public function generarReportePorRancho(int $ranchoId): array
    {
        $animales = $this->animalRepository->findAllByRancho($ranchoId);

        return array_map(fn ($animal) => [
            'id' => $animal->id,
            'arete' => $animal->numeroArete,
            'nombre' => $animal->nombre,
            'rancho_id' => $animal->ranchoId,
        ], $animales);
    }
}