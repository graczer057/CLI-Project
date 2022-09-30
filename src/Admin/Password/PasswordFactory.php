<?php

declare(strict_types=1);

namespace App\Admin\Password;

class PasswordFactory
{
    public static function passwordFromFile(string $passwordFilePath): array
    {
        if (!is_file($passwordFilePath)) {
            throw new \Exception("Nie znaleziono pliku");
        }

        $openPasswordFile = fopen($passwordFilePath, 'r');

        $passwords = [];

        $countPasswords = 0;

        while ($line = fgets($openPasswordFile)) {
            if($countPasswords === 0) {
                $isActivePassword = true;
            } else {
                $isActivePassword = false;
            }

            $passwords[] = new Password(
                $countPasswords,
                trim($line),
                $isActivePassword
            );

            $countPasswords++;
        }

        fclose($openPasswordFile);

        return $passwords;
    }
}