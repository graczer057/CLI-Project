<?php

declare(strict_types=1);

namespace App\Game\Level;

use App\Game\Prize\PrizeType;

class Level
{
    public function __construct(
        private readonly string $name,
        private readonly int $gamesNumber,
        private readonly int $maxLives,
        private readonly PrizeType $prizeType
    ) {

    }

    public function __toString(): string
    {
        $prizeNameInPolish = match ($this->prizeType) {
            PrizeType::TEXT => 'tekst',
            PrizeType::RECTANGLE => 'prostokąt',
            PrizeType::TRIANGLE => 'trójkąt',
        };

        return "{$this->name} - liczba gier: {$this->gamesNumber} - liczba żyć: {$this->maxLives} - nagroda: {$prizeNameInPolish}";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGamesNumber(): int
    {
        return $this->gamesNumber;
    }

    public function getMaxLives(): int
    {
        return $this->maxLives;
    }

    public function getPrizeType(): PrizeType
    {
        return $this->prizeType;
    }
}