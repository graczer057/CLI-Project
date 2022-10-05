<?php

declare(strict_types=1);

namespace App\Setting\Level;

interface TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void;
}