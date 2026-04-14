<?php

namespace Cable8mm\MmaScrapers\DTO;

use Cable8mm\MmaScrapers\Enum\FightMethod;
use Cable8mm\MmaScrapers\Enum\FightStatus;
use Cable8mm\MmaScrapers\Enum\WeightClass;
use Cable8mm\MmaScrapers\Enum\WinnerCorner;

/**
 * Data Transfer Object representing a fight.
 */
class FightDTO
{
    /**
     * FightDTO constructor.
     *
     * @param FighterDTO $redFighter Red Fighter information.
     * @param FighterDTO $blueFighter Blue Fighter information.
     * @param FightStatus|null $status The status of the fight (e.g., scheduled, completed).
     * @param WeightClass|null $weightClass The weight class of the fight (e.g., Lightweight, Middleweight).
     * @param FightMethod|null $method The method of victory (e.g., KO, Submission).
     * @param int|null $round The round in which the fight ended.
     * @param string|null $time The time at which the fight ended in the final round.
     * @param WinnerCorner|null $winnerCorner The corner of the winning fighter (red or blue).
     */
    public function __construct(
        public FighterDTO $redFighter,
        public FighterDTO $blueFighter,
        public ?FightStatus $status = null,
        public ?WeightClass $weightClass = null,
        public ?FightMethod $method = null,
        public ?int $round = null,
        public ?string $time = null,
        public ?WinnerCorner $winnerCorner = null
    ) {
    }
}
