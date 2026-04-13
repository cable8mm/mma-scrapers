<?php

namespace Cable8mm\MmaScrapers\Contract;

use Cable8mm\MmaScrapers\DTO\EventDTO;

interface EventParserInterface
{
    public function parse(string $html): EventDTO|array;
}
