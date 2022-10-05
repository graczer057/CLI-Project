<?php

declare(strict_types=1);

require_once './vendor/autoload.php';

use App\Kernel;
use App\Setting\Password\CheckPassword\FilePassword;
use App\Setting\Password\CheckPassword\VerifyPasswordFile;
use App\Setting\Password\CreatePassword\CreatePasswordFile;
use App\Setting\Password\CreatePassword\PasswordHashBcrypt;
use App\Setting\Password\ResetPassword\ResetFilePassword;

$password = getopt('', ["password:"]);

$kernel = new Kernel(new FilePassword(), new CreatePasswordFile(), new PasswordHashBcrypt(), new VerifyPasswordFile(), new ResetFilePassword(), ($password["password"] ?? null));

if(isset($password["password"])) {
    $kernel->passwordActions();
}

$kernel->start();