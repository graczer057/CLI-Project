<?php

declare(strict_types=1);

namespace App\Setting\Password\CreatePassword;

use App\Setting\Password\CheckPassword\PasswordChecker;
use App\Setting\Password\CheckPassword\ReadPassword;
use App\Utils\CLIWriter;

class CreatePasswordFile implements CreatePassword
{
    public function create(PasswordChecker $passwordChecker, PasswordHash $passwordHash): void
    {
        if (!$passwordChecker->check()) {
            $userTypePassword = ReadPassword::read("Widzimy, że nie ma ustawionego hasła dla administratora, dlatego podaj hasło teraz: ");

            $newFilePath = './Password.txt';

            $passwordFile = fopen($newFilePath, 'w');

            $hashedPassword = $passwordHash->hash($userTypePassword);

            fwrite($passwordFile, $hashedPassword);

            fclose($passwordFile);

            CLIWriter::writeNl("Hasło zostało pomyślnie utworzone");
        }

        CLIWriter::writeNl("Hasło istnieje");

    }
}