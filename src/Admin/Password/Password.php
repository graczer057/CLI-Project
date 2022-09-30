<?php

declare(strict_types=1);

namespace App\Admin\Password;

class Password
{
    public function __construct(
        private readonly int    $id,
        private readonly string $password,
        private readonly bool   $isActive,
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }
}