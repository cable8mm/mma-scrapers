<?php

namespace Cable8mm\MmaScrapers\DTO;

use Cable8mm\MmaScrapers\Enums\FightStatus;
use Cable8mm\MmaScrapers\Enums\WinnerCorner;

class Fight
{
    public function __construct(
        public string $eventName,

        public Fighter $redFighter,
        public Fighter $blueFighter,
        public ?FightStatus $status,

        public ?string $weightClass,
        public ?string $method,

        public ?int $round,
        public ?string $time,

        public ?WinnerCorner $winnerCorner
    ) {}
}
