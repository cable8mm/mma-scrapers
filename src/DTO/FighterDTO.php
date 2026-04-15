<?php

namespace Cable8mm\MmaScrapers\DTO;

/**
 * Data Transfer Object representing a fighter.
 */
class FighterDTO
{
    /**
    * FighterDTO constructor.
    *
    * @param string $name The name of the fighter.
    * @param string|null $nickname The fighter's nickname, if available.
    * @param string|null $teamname The name of the fighter's team or gym, if available.
    * @param string|null $height The fighter's height, if available.
    * @param int|null $win The number of wins the fighter has, if available.
    * @param int|null $lose The number of losses the fighter has, if available.
    * @param int|null $draw The number of draws the fighter has, if available.
    * @param int|null $sherdogId The fighter's Sherdog ID, if available.
    */
    public function __construct(
        public string $name,
        public ?string $nickname = null,
        public ?string $teamname = null,
        public ?string $height = null,
        public ?int $win = null,
        public ?int $lose = null,
        public ?int $draw = null,
        public ?int $sherdogId = null,
    ) {
    }
}
