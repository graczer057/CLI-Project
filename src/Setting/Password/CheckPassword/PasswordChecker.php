<?php

declare(strict_types=1);

namespace App\Setting\Password\CheckPassword;

interface PasswordChecker
{
    public function check(): bool;
}