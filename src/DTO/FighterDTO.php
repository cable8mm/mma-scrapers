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
    * @param string $name
    */
    public function __construct(public string $name)
    {
    }
}
