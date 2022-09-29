<?php

declare(strict_types=1);

namespace App\Level;

class LevelsFactory
{
    public static function levelsFromFile(string $filePath): array
    {
        if (!is_file($filePath)) {
            throw new \Exception("Nie znaleziono pliku");
        }

        $fileOpen = fopen($filePath, 'r');

        $levels = [];

        while ($line = fgets($fileOpen)) {
            $parameters = explode(',', $line);

            $levels[] = new Level(
                trim($parameters[0]),
                (int)trim($parameters[1]),
                (int)trim($parameters[2]),
                PrizeType::tryFrom(trim($parameters[3]))
            );
        }

        fclose($fileOpen);

        return $levels;
    }
}