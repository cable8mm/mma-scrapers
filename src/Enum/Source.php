<?php

namespace Cable8mm\MmaScrapers\Enum;

/**
 * Enum representing the source of the scraped data.
 */
enum Source: string
{
    case OFFICIAL = 'official';
    case TAPOLOGY = 'tapology';
    case SHERDOG = 'sherdog';
}
