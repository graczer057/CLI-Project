<?php

declare(strict_types=1);

namespace App\Utils;

class ExceptionTest
{
    public $var;
    const NO_EXCEPTION = 0;
    const CUST_EXCEPTION = 1;
    const DEF_EXCEPTION = 2;

    function __construct($val = self::NO_EXCEPTION)
    {
        switch ($val) {
            case self::CUST_EXCEPTION:
                throw new GameOverException("1 is an invalid parameter", 5);
                break;
            case self::DEF_EXCEPTION:
                throw new GameOverException('2 is not allowed as a parameter', 6);
                break;
            default:
                $this->var = $val;
                break;
        }
    }
}