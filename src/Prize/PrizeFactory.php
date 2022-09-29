<?php

declare(strict_types=1);

namespace App\Prize;

use App\Level\PrizeType;

class PrizeFactory
{
    public static function create(PrizeType $prizeType, int $firstAnswer, int $secondAnswer = null)
    {
        switch ($prizeType) {
            case PrizeType::TEXT:
                TextPrize::draw($firstAnswer, $secondAnswer);
                break;
            case PrizeType::RECTANGLE:
                RectanglePrize::draw($firstAnswer, $secondAnswer);
                break;
            case PrizeType::TRIANGLE:
                TrianglePrize::draw($firstAnswer, $secondAnswer);
                break;
        }
    }
}