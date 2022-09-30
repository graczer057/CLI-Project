<?php

declare(strict_types=1);

namespace App\Menu;

class MenuFactory
{
    public static function menuOptions(): array
    {
        $menuOptions = [0 => "Graj", 1 => "Ustawienia", 2 => "Wyjdź"];

        foreach ($menuOptions as $menuOption) {
            $menu[] = new Menu(
                $menuOption
            );
        }

        return $menu;
    }
}