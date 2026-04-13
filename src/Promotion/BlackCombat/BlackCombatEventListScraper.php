<?php

namespace Cable8mm\MmaScrapers\Promotion\BlackCombat;

use Cable8mm\MmaScrapers\Contract\HttpClientInterface;
use Cable8mm\MmaScrapers\Contract\Scraper;
use Cable8mm\MmaScrapers\DTO\EventDTO;
use Cable8mm\MmaScrapers\Parser\BlackCombat\BlackCombatEventListParser;

class BlackCombatEventListScraper implements Scraper
{
    private const EVENTS_URL = 'https://www.blackcombat-official.com/event.php';

    public function __construct(
        private HttpClientInterface $http,
        private BlackCombatEventListParser $parser
    ) {
    }

    /**
     * @return EventDTO[]
     */
    public function scrape(?string $url = self::EVENTS_URL): array
    {
        $html = $this->http->get($url);

        return $this->parser->parse($html);
    }
}
