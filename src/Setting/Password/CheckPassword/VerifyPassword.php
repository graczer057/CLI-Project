<?php

declare(strict_types=1);

namespace App\Setting\Password\CheckPassword;

interface VerifyPassword
{
    public function verify(string $userTypePassword): bool;
}