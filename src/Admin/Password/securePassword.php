<?php

declare(strict_types=1);

namespace App\Admin\Password;

class securePassword
{
    public static function secureOnAwake(): void
    {
        $passwordFilePath = './Password.txt';

        if (!is_file($passwordFilePath)) {
            throw new \Exception("Nie znaleziono pliku");
        }


        $passwordFile = fopen($passwordFilePath, 'r+');

        while ($line = fgets($passwordFile)) {
            $password = trim($line);

            if (strlen($password) <= 30) {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $changeLine = file_get_contents($passwordFilePath);
                $changeLine = str_replace($password, $passwordHash, $changeLine);
                file_put_contents($passwordFilePath, $changeLine);
            }
        }

        fclose($passwordFile);
    }
}