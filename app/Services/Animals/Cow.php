<?php

declare(strict_types=1);

namespace App\Services\Animals;

use App\Services\Abstracts\Animals\AnimalAbstract;

class Cow extends AnimalAbstract
{
    public function getResource(): int
    {
        return rand(8, 12);
    }
}