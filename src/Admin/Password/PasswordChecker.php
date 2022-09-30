<?php

declare(strict_types=1);

namespace App\Admin\Password;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class PasswordChecker
{
    public static function typePassword(): bool
    {
        $passwords = PasswordFactory::passwordFromFile('./Password.txt');

        return self::getPassword($passwords);
    }

    private static function getPassword(array $passwords): bool
    {
        CLIWriter::writeNl("Witaj administratorze, podaj hasło: ");
        $isPasswordActive = true;

        $activePassword = " ";

        foreach ($passwords as $password) {
            if($password->getIsActive() === $isPasswordActive) {
                $activePassword = $password->getPassword();
            }
        }

        $userTypedPassword = CLIReader::readString();

        if($activePassword !== trim($userTypedPassword)) {
            CLIWriter::writeNl("To jest złe hasło! Wiemy, że tak naprawdę jesteś graczem ;) dlatego zacznij grać");
            return false;
        }

        return true;

    }
}