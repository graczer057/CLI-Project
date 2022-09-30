<?php

declare(strict_types=1);

namespace App\Admin\Password;

class PasswordFactory
{
    public static function passwordFromFile(string $passwordFilePath): string
    {
        if (!is_file($passwordFilePath)) {
            throw new \Exception("Nie znaleziono pliku");
        }

        $passwordFile = fopen($passwordFilePath, 'r');

        $password = '';

        while ($line = fgets($passwordFile)) {
            $password = trim($line);
        }

        fclose($passwordFile);

        return $password;
    }
}