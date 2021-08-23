<?php

namespace App\Services\Interfaces\Barns;

use App\Services\Interfaces\Animals\AnimalInterface;

interface BarnInterface
{
    /**
     * @return AnimalInterface[]
     */
    public function getAnimals(): array;
}