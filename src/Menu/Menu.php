<?php

declare(strict_types=1);

namespace App\Menu;

class Menu
{
    private string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}