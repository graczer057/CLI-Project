<?php

declare(strict_types=1);

namespace App\Game\Prize;

interface drawInterface
{
    public static function draw(int $firstAnswer, int $secondAnswer): void;
}