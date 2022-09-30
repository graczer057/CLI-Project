<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

use App\Kernel;

class TasksFactory
{
    public static function executeTask(int $adminChoiceNumber): void
    {
        $configFilePath = './Configuration.txt';
        $fileOperationMode = 'r+';

        switch($adminChoiceNumber) {
            case 0:
                $fileOperationMode = 'a+';
                CreateLevel::execute($configFilePath, $fileOperationMode);
                break;
            case 1:
                EditLevel::execute($configFilePath, $fileOperationMode);
                break;
            case 2:
                DeleteLevel::execute($configFilePath, $fileOperationMode);
                break;
            case 3:
                Kernel::start();
                break;
        }
    }
}