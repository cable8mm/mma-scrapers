<?php

namespace Cable8mm\MmaScrapers\DTO;

class EventDTO
{
    public function __construct(
        public string $name,
        public ?string $location,
        public \DateTimeInterface $date,
        public string $url
    ) {}
}
