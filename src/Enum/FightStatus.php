<?php

namespace Cable8mm\MmaScrapers\Enum;

enum FightStatus: string
{
    case SCHEDULED = 'scheduled';
    case LIVE = 'live';
    case FINISHED = 'finished';
}
