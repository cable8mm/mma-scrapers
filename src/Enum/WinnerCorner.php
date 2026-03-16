<?php

namespace Cable8mm\MmaScrapers\Enum;

enum WinnerCorner: string
{
    case RED = 'red';
    case BLUE = 'blue';
    case DRAW = 'draw';
    case NC = 'no contest';
}
