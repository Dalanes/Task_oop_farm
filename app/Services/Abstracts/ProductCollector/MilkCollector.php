<?php

namespace App\Services\Abstracts\ProductCollector;

use App\Services\Animals\Cow;

class MilkCollector
{
    /**
     * @param string $resourceUnit
     * @param int $collectedResource
     */
    public function __construct(
        private string $resourceUnit = 'л.',
        private int    $collectedResource = 0
    )
    {
    }

    /**
     * @param Cow[] $cows
     */
    public function harvest(array $cows): self
    {
        $litersOfMilk = array_reduce($cows, function ($carry, $item) {
            return $carry + $item->getResource();
        }, 0);

        $this->collectedResource = $litersOfMilk;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollectedForDisplay(): string
    {
        return $this->collectedResource . ' ' . $this->resourceUnit;
    }
}