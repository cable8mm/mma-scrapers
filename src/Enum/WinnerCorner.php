<?php

namespace Cable8mm\MmaScrapers\Enum;

/**
 * Enum representing the corner of the winner in a fight.
 */
enum WinnerCorner: string
{
    case RED = 'red';
    case BLUE = 'blue';
    case DRAW = 'draw';
    case NC = 'no contest';
}
