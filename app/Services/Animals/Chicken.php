<?php

declare(strict_types=1);

namespace App\Services\Animals;

use App\Services\Abstracts\Animals\AnimalAbstract;

class Chicken extends AnimalAbstract
{
    public function getResource(): int
    {
        return rand(0, 1);
    }
}