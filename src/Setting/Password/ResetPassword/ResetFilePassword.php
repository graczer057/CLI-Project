<?php

declare(strict_types=1);

namespace App\Setting\Password\ResetPassword;

use App\Setting\Password\CheckPassword\PasswordChecker;
use App\Setting\Password\CheckPassword\ReadPassword;
use App\Setting\Password\CreatePassword\PasswordHash;
use App\Utils\CLIWriter;

class ResetFilePassword implements PasswordReset
{

    public function reset(PasswordChecker $passwordChecker, PasswordHash $passwordHash): void
    {
        if (!$passwordChecker->check()) {
            CLIWriter::writeNl("Hasło nie istnieje, w celu resetowania hasła, musisz najpierw mieć hasło ;)");
        }

        $userPassword = ReadPassword::read("W celu zresetowania hasła, podaj nowe hasło: ");

        $filePath = './Password.txt';

        $passwordFile = fopen($filePath, 'w');

        $hashedPassword = $passwordHash->hash($userPassword);

        fwrite($passwordFile, $hashedPassword);

        fclose($passwordFile);

        CLIWriter::writeNl("Hasło zostało pomyślnie zmienione");
    }
}