<?php

namespace Cable8mm\MmaScrapers\Enum;

enum FightMethod: string
{
    case KO = 'ko';
    case TKO = 'tko';
    case SUBMISSION = 'submission';
    case DECISION = 'decision';
    case DQ = 'disqualification';
    case NC = 'no contest';
}
