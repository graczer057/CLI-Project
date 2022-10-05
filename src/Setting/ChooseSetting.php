<?php

declare(strict_types=1);

namespace App\Setting;

use App\Setting\Password\CheckPassword\PasswordChecker;
use App\Setting\Password\CheckPassword\ReadPassword;
use App\Setting\Password\CheckPassword\VerifyPassword;
use App\Setting\Password\CreatePassword\CreatePassword;
use App\Setting\Password\CreatePassword\PasswordHash;
use App\Setting\Level\TaskFactory;
use App\Utils\CLIWriter;

class ChooseSetting
{
    public static function run(PasswordChecker $passwordChecker, VerifyPassword $verifyPassword, CreatePassword $createPassword, PasswordHash $passwordHash): void
    {
        try {
            $createPassword->create($passwordChecker, $passwordHash);
            $userPassword = ReadPassword::read("W celu zalogowania, podaj hasło:");
            $check = $verifyPassword->verify($userPassword);

            if($check === true) {
                TaskFactory::selectLevel();
            } else {
                CLIWriter::writeNl("To jest nie poprawne hasło");
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}