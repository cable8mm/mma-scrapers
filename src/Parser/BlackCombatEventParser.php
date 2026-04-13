<?php

namespace Cable8mm\MmaScrapers\Parser;

use Cable8mm\MmaScrapers\Contract\EventParserInterface;
use Cable8mm\MmaScrapers\DTO\EventDTO;
use Symfony\Component\DomCrawler\Crawler;

class BlackCombatEventParser implements EventParserInterface
{
    /**
     * Parse the HTML content and extract event information.
     *
     * @param string $html The HTML content to parse.
     * @return EventDTO[]
     */
    public function parseEvents(string $html): array
    {
        $crawler = new Crawler($html);

        $events = [];

        $crawler->filter('.event_list li')->each(function (Crawler $node) use (&$events) {

            $lines = $node->filter('div > div > div');

            $name = trim($lines->eq(0)->text());

            $date = trim($lines->eq(1)->text()); // 2026년 01월 31일
            $date = str_replace('년', '-', $date);
            $date = str_replace('월', '-', $date);
            $date = str_replace('일', '', $date);
            $date = str_replace(' ', '', $date);

            $date = new \DateTimeImmutable($date);

            $location = trim($lines->eq(2)->text());

            $url = $node->filter('button')->attr('onclick');

            $url = str_replace('location.href=', '', $url);
            $url = str_replace('"', '', $url);
            $url = str_replace("';", '', $url);

            $events[] = new EventDTO(
                $name,
                $location,
                $date,
                $url
            );
        });

        return $events;
    }

    /**
     * Parse the HTML content and extract detailed event information.
     *
     * @param string $html The HTML content to parse.
     * @return EventDTO The detailed event information.
     */
    public function parseEvent(string $html): EventDTO
    {
        $crawler = new Crawler($html);

        $event = new EventDTO(
            name: $crawler->filter('div.category')->text()
        );

        return $event;
    }

    /**
     * Parse the HTML content and extract fight information.
     *
     * @param string $html The HTML content to parse.
     * @return array The list of fights.
     */
    public function parseFights(string $html): array
    {
        // Implementation for parsing fights

        return [];
    }
}
