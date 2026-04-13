<?php

namespace Cable8mm\MmaScrapers\Enum;

/**
 * Enum representing the status of a fight.
 */
enum FightStatus: string
{
    case SCHEDULED = 'scheduled';
    case LIVE = 'live';
    case FINISHED = 'finished';
}
