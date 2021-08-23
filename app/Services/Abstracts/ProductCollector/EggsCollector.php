<?php

namespace App\Services\Abstracts\ProductCollector;

use App\Services\Animals\Chicken;

class EggsCollector
{
    /**
     * @param string $resourceUnit
     * @param int $collectedResource
     */
    public function __construct(
        private string $resourceUnit = 'шт.',
        private int    $collectedResource = 0
    )
    {
    }

    /**
     * @param Chicken[] $chickens
     */
    public function harvest(array $chickens)
    {
        $numberOfEggs = array_reduce($chickens, function ($carry, $item) {
            return $carry + $item->getResource();
        }, 0);

        $this->collectedResource = $numberOfEggs;

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