<?php

declare(strict_types=1);

namespace App\Menu;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class MenuChecker
{
    public static function selectMenu(): Menu
    {
        $menus = MenuFactory::menuOptions();

        return self::getMenu($menus);
    }

    private static function getMenu(array $menus): Menu
    {
        do {
            CLIWriter::writeNl("Witamy w CLI - Project!");

            $i = 0;
            foreach ($menus as $menu) {
                CLIWriter::writeNl("$i -> " . $menu->getName());

                $i++;
            }

            CLIWriter::writeNl("Co zamierzasz zrobić: ");

            $choiceNumber = CLIReader::readInt();
        } while (!key_exists($choiceNumber, $menus));

        return $menus[$choiceNumber];
    }
}