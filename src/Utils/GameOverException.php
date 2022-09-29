<?php

declare(strict_types=1);

namespace App\Utils;

use Throwable;

class GameOverException extends \Exception
{
    public function __construct(string $msg = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($msg, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}[: {$this->message}\n";
    }

    public function custFunc() {
        CLIWriter::writeNl("Koniec gry, przykro mi kolego.");
    }
}