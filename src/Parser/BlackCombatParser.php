<?php

namespace Cable8mm\MmaScrapers\Parser;

use Cable8mm\MmaScrapers\DTO\EventDTO;
use Symfony\Component\DomCrawler\Crawler;

class BlackCombatParser
{
    public function parseEvents(string $html): array
    {
        $crawler = new Crawler($html);

        $events = [];

        $crawler->filter('.event-card')->each(function (Crawler $node) use (&$events) {

            $name = $node->filter('.event-title')->text();
            $date = $node->filter('.event-date')->text();

            $events[] = new EventDTO(
                name: $name,
                date: new \DateTime($date)
            );
        });

        return $events;
    }
}
