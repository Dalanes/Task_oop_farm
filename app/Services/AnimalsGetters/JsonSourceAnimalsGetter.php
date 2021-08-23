<?php

namespace App\Services\AnimalsGetters;

use App\Services\Interfaces\AnimalsGetters\SourceAnimalsGetter;

class JsonSourceAnimalsGetter implements SourceAnimalsGetter
{
    public function getAnimalsFromSource(): array
    {
        try {

            $path_to_file = 'files/animals_in_the_barn.json';
            if (!file_exists($path_to_file)) {
                throw new \Exception('Json файла с информацией о животных не существует.');
            }

            $file = file_get_contents($path_to_file, TRUE);
            if (empty($file)) {
                throw new \Exception('Json файл с информацией о животных пуст.');
            }

            $animals = json_decode($file);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Некорректный JSON формат.');
            }
        } catch (\Exception $e) {
            echo 'Ошибка: ' . $e->getMessage();
            exit;
        }

        return (array)$animals;
    }
}