<?php

declare(strict_types=1);

namespace App\Admin\Password;

use App\Utils\CLIWriter;

class PasswordChecker
{
    public static function typePassword(): bool
    {
        $password = PasswordFactory::passwordFromFile('./Password.txt');

        return self::getPassword($password);
    }

    private static function getPassword(string $password): bool
    {
        $userTypedPassword = PasswordPrompt::promptSilent();
        $userTypedPassword = trim($userTypedPassword);

        if (password_verify($userTypedPassword, $password)) {
            return true;
        } else {
            CLIWriter::writeNl("To jest złe hasło! Wiemy, że tak naprawdę jesteś graczem ;) dlatego zacznij grać");
            return false;
        }
    }
}