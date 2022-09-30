<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

interface TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void;
}