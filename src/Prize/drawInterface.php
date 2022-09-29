<?php

declare(strict_types=1);

namespace App\Prize;

interface drawInterface
{
    public static function draw(int $firstAnswer, int $secondAnswer): void;
}