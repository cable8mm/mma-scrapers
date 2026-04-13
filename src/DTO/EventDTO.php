<?php

namespace Cable8mm\MmaScrapers\DTO;

/**
 * Data Transfer Object representing an event.
 */
class EventDTO
{
    /**
     * EventDTO constructor.
     *
     * @param string $name
     * @param string|null $location
     * @param \DateTimeInterface|null $date
     * @param string|null $url
     * @param string|null $externalId
     */
    public function __construct(
        public string $name,
        public ?string $location = null,
        public ?\DateTimeInterface $date = null,
        public ?string $url = null,
        public ?string $externalId = null
    ) {
    }
}
