<?php

declare(strict_types=1);

namespace App\Setting\Password\ResetPassword;

use App\Setting\Password\CheckPassword\PasswordChecker;
use App\Setting\Password\CreatePassword\PasswordHash;

interface PasswordReset
{
    public function reset(PasswordChecker $passwordChecker, PasswordHash $passwordHash): void;
}