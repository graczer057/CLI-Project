<?php

declare(strict_types=1);

namespace App\Game\Prize;

class TrianglePrize implements drawInterface
{
    public static function draw(int $firstAnswer, int $secondAnswer): void
    {
        echo PHP_EOL;
        for ($i = 1; $i <= $firstAnswer; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo "*";
            }
            echo PHP_EOL;
        }
    }
}