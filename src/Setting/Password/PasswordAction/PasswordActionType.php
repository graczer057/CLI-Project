<?php

declare(strict_types=1);

namespace App\Setting\Password\PasswordAction;

enum PasswordActionType: string
{
    case CREATE = "Create";
    case RESET = "Reset";
}
