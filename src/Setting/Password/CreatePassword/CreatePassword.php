<?php

namespace App\Setting\Password\CreatePassword;

use App\Setting\Password\CheckPassword\PasswordChecker;

interface CreatePassword
{
    public function create(PasswordChecker $passwordChecker, PasswordHash $passwordHash): void;
}