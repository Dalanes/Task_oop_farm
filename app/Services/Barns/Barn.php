<?php

namespace App\Services\Barns;

use App\Services\Animals\Chicken;
use App\Services\Animals\Cow;
use App\Services\Interfaces\Animals\AnimalInterface;
use App\Services\Interfaces\AnimalsGetters\SourceAnimalsGetter;
use App\Services\Interfaces\Barns\BarnInterface;

class Barn implements BarnInterface
{
    /**
     * @var AnimalInterface[]
     */
    private array $animals = [];

    /**
     * @var SourceAnimalsGetter
     */
    private SourceAnimalsGetter $sourceAnimalsGetter;

    /**
     * @param SourceAnimalsGetter $sourceAnimalsGetter
     */
    public function __construct(SourceAnimalsGetter $sourceAnimalsGetter)
    {
        $this->sourceAnimalsGetter = $sourceAnimalsGetter;
        $this->animals = $this->animalsMapping();
    }

    /**
     * @return AnimalInterface[]
     */
    private function animalsMapping(): array
    {
        $animalsFromSource = $this->sourceAnimalsGetter->getAnimalsFromSource();
        array_walk($animalsFromSource, function (&$currentAnimalItems, $keyFromSource) {
            $currentAnimalItems = array_map(function ($item) use ($keyFromSource, $currentAnimalItems) {
                switch ($keyFromSource) {
                    case 'chickens' :
                    {
                        $aid = $item->aid;
                        $item = new Chicken();
                        $item->setAid($aid);
                        break;
                    }

                    case 'cows' :
                    {
                        $aid = $item->aid;
                        $item = new Cow();
                        $item->setAid($aid);
                        break;
                    }
                }

                return $item;
            }, $currentAnimalItems);
        });

        return $animalsFromSource;
    }

    /**
     * @return AnimalInterface[]
     */
    public function getAnimals(): array
    {
        return $this->animals;
    }
}