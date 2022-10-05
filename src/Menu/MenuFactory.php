<?php

declare(strict_types=1);

namespace App\Menu;

class MenuFactory
{
    private const OPTIONS = ["Graj", "Ustawienia", "Wyjdź"];

    public static function menuOptions(): array
    {
        foreach (self::OPTIONS as $menuOption) {
            $menu[] = new Menu($menuOption);
        }

        return $menu ?? [];
    }
}