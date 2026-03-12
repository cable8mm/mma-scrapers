<?php

namespace Cable8mm\MmaScrapers\Enums;

enum FightStatus: string
{
    case SCHEDULED = 'scheduled';
    case LIVE = 'live';
    case FINISHED = 'finished';
}
