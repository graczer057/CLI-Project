<?php

declare(strict_types=1);

namespace App\Prize;

use App\Utils\PrintChar;

class TextPrize implements drawInterface
{
    public static function draw(int $firstAnswer, int $secondAnswer = null): void
    {
        $repeatQuantity = (int)round($firstAnswer / 2);

        echo PHP_EOL;

        PrintChar::print($repeatQuantity, ">");

        echo "NAGRODA";

        PrintChar::print($repeatQuantity, "<");
    }
}