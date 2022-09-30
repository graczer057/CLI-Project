<?php

declare(strict_types=1);

namespace App\Role;

class Role
{
    private string $role;

    public function __construct(
        string $role
    ) {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}