<?php

declare(strict_types=1);

namespace App\Menu;

enum MenuType: string
{
    case PLAY = 'Graj';
    case SETTINGS = 'Ustawienia';
    case EXIT = 'Wyjdź';
}
