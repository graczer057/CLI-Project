<?php

declare(strict_types=1);

namespace App\Setting\Password\CreatePassword;

class PasswordHashBcrypt implements PasswordHash
{

    public function hash(string $passwordToHash): string
    {
        return password_hash($passwordToHash, PASSWORD_BCRYPT);
    }
}