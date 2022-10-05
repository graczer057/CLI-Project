<?php

declare(strict_types=1);

namespace App\Utils;

use App\Game\Prize\PrizeType;

class CLIReader
{
    public static function readInt(): int
    {
        return (int)fgets(STDIN);
    }

    public static function readString(): string
    {
        return (string)fgets(STDIN);
    }

    public static function readLevel(string $msg = ''): array
    {
        CLIWriter::writeNl($msg);

        do {
            CLIWriter::writeNl("Podaj nazwę poziomu: ");

            $name = self::readString();
            $trimmedName = trim($name);
        }while($trimmedName == false);

        do {
            CLIWriter::writeNl("Podaj liczbę gier: ");

            $games = self::readInt();
        }while($games <= 0);

        do {
            CLIWriter::writeNl("Podaj liczbę żyć: ");

            $tries = self::readInt();
        }while($tries < 0);

        do {
            CLIWriter::writeNl("Wybierz nagrodę z poniższej listy: ");

            $i = 0;

            foreach (PrizeType::cases() as $prizeType) {
                $translatedPrizeType = Dictionary::prizesDictionary($prizeType->value);

                CLIWriter::writeNl("$i -> {$translatedPrizeType}");

                $i++;
            }

            $prizeInput = (string)fgets(STDIN);

            $prizeTrim = strtolower(trim($prizeInput));

            $pr = match ($prizeTrim) {
                '0', 'tekst' => PrizeType::TEXT->name,
                '1', 'prostokat' => PrizeType::RECTANGLE->name,
                '2', 'trojkat' => PrizeType::TRIANGLE->name,
                default => false,
            };

        } while ($pr === false);

        return array(trim($name), $games, $tries, $pr);
    }
}