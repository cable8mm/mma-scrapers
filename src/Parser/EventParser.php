<?php

namespace Cable8mm\MmaScrapers\Parser;

use Cable8mm\MmaScrapers\DTO\EventDTO;
use Symfony\Component\DomCrawler\Crawler;

class EventParser
{
    public function parse(string $html): EventDTO
    {
        $crawler = new Crawler($html);

        $event = new EventDTO(
            name: 'event name'
        );

        $event->name = $crawler->filter('h1')->text();

        return $event;
    }
}
