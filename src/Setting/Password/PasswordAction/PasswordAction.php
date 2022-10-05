<?php

declare(strict_types=1);

namespace App\Setting\Password\PasswordAction;

use App\Setting\Password\CheckPassword\PasswordChecker;
use App\Setting\Password\CreatePassword\CreatePassword;
use App\Setting\Password\CreatePassword\PasswordHash;
use App\Setting\Password\ResetPassword\PasswordReset;

class PasswordAction
{
    public static function select(string $passwordAction, CreatePassword $createPassword, PasswordReset $passwordReset, PasswordChecker $passwordChecker, PasswordHash $passwordHash): void
    {
        match (PasswordActionType::tryFrom($passwordAction)) {
            PasswordActionType::CREATE => $createPassword->create($passwordChecker, $passwordHash),
            PasswordActionType::RESET => $passwordReset->reset($passwordChecker, $passwordHash),
            default => throw new \Exception("Invalid operation"),
        };
    }
}