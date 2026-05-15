<?php

namespace App\Repositories;

use App\Contracts\IAnimalRepository;
use App\Models\Animal;

class EloquentAnimalRepository implements IAnimalRepository
{
    private array $animales = [];

    public function findByArete(string $arete): ?Animal
    {
        foreach ($this->animales as $animal) {
            if ($animal->numeroArete === $arete) {
                return $animal;
            }
        }

        return null;
    }

    public function findAllByRancho(int $ranchoId): array
    {
        return array_values(array_filter(
            $this->animales,
            fn (Animal $animal) => $animal->ranchoId === $ranchoId
        ));
    }

    public function save(Animal $animal): void
    {
        $this->animales[$animal->id] = $animal;
    }

    public function delete(int $id): void
    {
        unset($this->animales[$id]);
    }
}