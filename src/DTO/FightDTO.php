<?php

namespace Cable8mm\MmaScrapers\DTO;

use Cable8mm\MmaScrapers\Enum\FightStatus;
use Cable8mm\MmaScrapers\Enum\WinnerCorner;

class FightDTO
{
    public function __construct(
        public string $eventName,
        public FighterDTO $redFighter,
        public FighterDTO $blueFighter,
        public ?FightStatus $status,
        public ?string $weightClass,
        public ?string $method,
        public ?int $round,
        public ?string $time,
        public ?WinnerCorner $winnerCorner
    ) {
    }
}
