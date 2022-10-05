<?php

declare(strict_types=1);

namespace App\Setting\Password\CheckPassword;

class FilePassword implements PasswordChecker
{
    public function check(): bool
    {
        $filePath = './Password.txt';

        return is_file($filePath);
    }
}