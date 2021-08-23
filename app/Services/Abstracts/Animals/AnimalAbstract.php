<?php

declare(strict_types=1);

namespace App\Services\Abstracts\Animals;

use App\Services\Interfaces\Animals\AnimalInterface;

abstract class AnimalAbstract implements AnimalInterface
{
    /**
     * Уникальный регистрационный номер животного.
     *
     * @var string
     */
    protected string $aid;

    public function __construct()
    {
    }

    /**
     * @param string $aid
     */
    public function setAid(string $aid)
    {
        $this->aid = $aid;
    }

    /**
     * @return int
     */
    abstract public function getResource(): int;
}