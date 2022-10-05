<?php

declare(strict_types=1);

namespace App\Setting\Password\CheckPassword;

class VerifyPasswordFile implements VerifyPassword
{
    public function verify(string $userTypePassword): bool
    {
        $passwordFilePath = "./Password.txt";

        $passwordFile = fopen($passwordFilePath, 'r');

        $correctPassword = fgets($passwordFile);

        return password_verify($userTypePassword, $correctPassword);
    }
}