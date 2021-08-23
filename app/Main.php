<?php

namespace App;

require '../vendor/autoload.php';

use App\Services\Abstracts\ProductCollector\ProductsCollector;
use App\Services\AnimalsGetters\JsonSourceAnimalsGetter;
use App\Services\Barns\Barn;

class Main
{
    /**
     * @var ProductsCollector
     */
    private ProductsCollector $productsCollector;

    /**
     * @param ProductsCollector $productsCollector
     */
    public function __construct(ProductsCollector $productsCollector)
    {
        $this->productsCollector = $productsCollector;
    }

    /**
     * @return
     */
    public function index()
    {
        $animals = $this->productsCollector->harvest();
        return $animals->getCollectedForDisplay();
    }
}

$main = new Main(new ProductsCollector(new Barn(new JsonSourceAnimalsGetter())));
var_dump($main->index());