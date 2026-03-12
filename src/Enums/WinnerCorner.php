<?php

namespace Cable8mm\MmaScrapers\Enums;

enum WinnerCorner: string
{
    case RED = 'red';
    case BLUE = 'blue';
    case DRAW = 'draw';
    case NC = 'no contest';
}
