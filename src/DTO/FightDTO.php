<?php

namespace Cable8mm\MmaScrapers\DTO;

use Cable8mm\MmaScrapers\Enum\FightStatus;
use Cable8mm\MmaScrapers\Enum\WinnerCorner;

/**
 * Data Transfer Object representing a fight.
 */
class FightDTO
{
    /**
     * FightDTO constructor.
     *
     * @param FighterDTO $redFighter
     * @param FighterDTO $blueFighter
     * @param FightStatus|null $status
     * @param string|null $weightClass
     * @param string|null $method
     * @param int|null $round
     * @param string|null $time
     * @param WinnerCorner|null $winnerCorner
     */
    public function __construct(
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
