<?php

namespace Cable8mm\MmaScrapers\DTO;

class Event
{
    public string $name;

    public string $date;

    public ?string $location = null;

    /** @var Fight[] */
    public array $fights = [];
}
