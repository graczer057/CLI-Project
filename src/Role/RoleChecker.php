<?php

declare(strict_types=1);

namespace App\Role;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class RoleChecker
{
    public static function selectRole(): Role
    {
        $roles = RoleFactory::rolesFromFile('./Roles.txt');

        return self::getRole($roles);
    }

    private static function getRole(array $roles): Role
    {
        do {
            CLIWriter::writeNl("Kim jesteś? Wybierz swoją rolę:");

            $i = 0;
            foreach ($roles as $role) {
                CLIWriter::writeNl("$i -> " . $role->getRole());

                $i++;
            }

            $choiceNumber = CLIReader::readInt();
        } while (!key_exists($choiceNumber, $roles));

        return $roles[$choiceNumber];
    }
}