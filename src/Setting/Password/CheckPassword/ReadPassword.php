<?php

declare(strict_types=1);

namespace App\Setting\Password\CheckPassword;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class ReadPassword
{
    public static function read($msg = ''): string
    {
        CLIWriter::writeNl($msg);

        return CLIReader::readString();
    }
}