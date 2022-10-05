<?php

declare(strict_types=1);

namespace App\Menu;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class MenuSelect
{
    public static function select(): Menu
    {
        $options = MenuFactory::menuOptions();

        do {
            self::printMenuItems($options);

            $choiceNumber = CLIReader::readInt();
            $choiceNumber--;
        } while (!key_exists($choiceNumber, $options));

        return $options[$choiceNumber];
    }

    private static function printMenuItems(array $options): void
    {
        CLIWriter::writeNl("Witamy w CLI - Project!");

        foreach ($options as $key => $menu) {
            $key++;
            CLIWriter::writeNl("$key -> " . $menu->getName());
        }

        CLIWriter::writeNl("Co zamierzasz zrobić: ");
    }
}