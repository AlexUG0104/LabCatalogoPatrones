<?php

namespace App\Models;

class Animal
{
    public function __construct(
        public int $id,
        public string $numeroArete,
        public string $nombre,
        public int $ranchoId
    ) {}
}