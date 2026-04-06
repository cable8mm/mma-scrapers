<?php

namespace Cable8mm\MmaScrapers\DTO;

class EventDTO
{
    public function __construct(
        public string $name,
        public ?string $location = null,
        public ?\DateTimeInterface $date = null,
        public ?string $url = null,
        public ?string $externalId = null
    ) {
    }
}
