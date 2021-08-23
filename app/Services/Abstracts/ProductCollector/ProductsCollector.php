<?php

namespace App\Services\Abstracts\ProductCollector;

use App\Services\Interfaces\Barns\BarnInterface;

class ProductsCollector
{
    /**
     * @var BarnInterface
     */
    private BarnInterface $barn;

    /**
     * @var MilkCollector
     */
    private MilkCollector $milkCollector;

    /**
     * @var EggsCollector
     */
    private EggsCollector $eggsCollector;

    /**
     * @param BarnInterface $barn
     */
    public function __construct(BarnInterface $barn)
    {
        $this->barn = $barn;
        $this->milkCollector = new MilkCollector();
        $this->eggsCollector = new EggsCollector();
    }

    /**
     * Сбор продуктов
     *
     * @return ProductsCollector
     */
    public function harvest(): ProductsCollector
    {
        $animals = $this->barn->getAnimals();
        foreach ($animals as $animalName => $animalValue) {
            switch ($animalName) {
                case 'cows' :
                {
                    $this->milkCollector->harvest($animalValue);
                }
                case 'chickens' :
                {
                    $this->eggsCollector->harvest($animalValue);
                }
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getCollectedForDisplay(): string
    {
        return $this->milkCollector->getCollectedForDisplay() . "\n"
            . $this->eggsCollector->getCollectedForDisplay();
    }
}