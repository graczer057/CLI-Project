<?php

declare(strict_types=1);

namespace App\Setting\Level;

class TasksFactory
{
    public static function executeTask(int $adminChoiceNumber): void
    {
        $configFilePath = 'Configuration.txt';
        $fileOperationMode = 'r+';

        switch($adminChoiceNumber) {
            case 0:
                ListLevel::execute($configFilePath, 'r');
                break;
            case 1:
                CreateLevel::execute($configFilePath, 'a+');
                break;
            case 2:
                EditLevel::execute($configFilePath, $fileOperationMode);
                break;
            case 3:
                DeleteLevel::execute($configFilePath, $fileOperationMode);
                break;
            case 4:
                break;
        }
    }
}