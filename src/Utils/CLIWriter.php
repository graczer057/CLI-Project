<?php

declare(strict_types=1);

namespace App\Utils;

class CLIWriter
{
    public static function write(string $msg = ''): void
    {
        echo $msg;
    }

    public static function writeNl(string $msg): void
    {
        self::write($msg . PHP_EOL);
    }
}