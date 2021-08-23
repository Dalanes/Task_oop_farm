<?php

declare(strict_types=1);

namespace App\Services\Interfaces\AnimalsGetters;

/**
 * Интерфейс получения животных из источника
 */
interface SourceAnimalsGetter
{
    /**
     * @return array
     */
    public function getAnimalsFromSource(): array;
}