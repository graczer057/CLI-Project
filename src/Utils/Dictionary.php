<?php

declare(strict_types=1);

namespace App\Utils;

class Dictionary
{
    private static $prizes = ["TEXT" => "Tekst", "RECTANGLE" => "Prostokąt", "TRIANGLE" => "Trójkąt"];

    public static function prizesDictionary(string $prizeToTranslate): string
    {
        return match(trim($prizeToTranslate)) {
            "TEXT" => self::$prizes["TEXT"],
            "RECTANGLE" => self::$prizes["RECTANGLE"],
            "TRIANGLE" => self::$prizes["TRIANGLE"],
            default => ""
        };
    }
}