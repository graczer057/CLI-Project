<?php

declare(strict_types=1);

namespace App\Setting\Password\CreatePassword;

interface PasswordHash
{
    public function hash(string $passwordToHash): string;
}