<?php

declare(strict_types=1);

namespace App\Game;

class Game
{
    private int $result;
    private int $gamesTries;

    public function __construct(
        private readonly int  $id,
        private readonly int  $gameIndex,
        private readonly int  $gamesNumber,
        int $result,
        int $gamesTries,
    ) {
        $this->result = $result;
        $this->gamesTries = $gamesTries;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGameIndex(): int
    {
        return $this->gameIndex;
    }

    public function getGamesNumber(): int
    {
        return $this->gamesNumber;
    }

    public function getGamesTries(): int
    {
        return $this->gamesTries;
    }

    public function setGamesTries(int $gamesTries): void
    {
        $this->gamesTries = $gamesTries;
    }

    public function getResult(): int
    {
        return $this->result;
    }

    public function setResult(int $result): void
    {
        $this->result = $result;
    }
}