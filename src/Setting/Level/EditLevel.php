<?php

declare(strict_types=1);

namespace App\Setting\Level;

class EditLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        editFileText::changeFile($configFilePath, $fileOperationMode, "Wybierz który poziom chcesz edytować: ", true);
    }
}