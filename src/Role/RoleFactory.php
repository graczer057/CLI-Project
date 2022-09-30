<?php

declare(strict_types=1);

namespace App\Role;

class RoleFactory
{
    public static function rolesFromFile(string $rolesFilePath): array
    {
        if (!is_file($rolesFilePath)) {
            throw new \Exception("Nie znaleziono pliku");
        }

        $openRoleFile = fopen($rolesFilePath, 'r');

        $roles = [];


        while ($line = fgets($openRoleFile)) {
            $roles[] = new Role(
                trim($line)
            );
        }

        fclose($openRoleFile);

        return $roles;
    }
}