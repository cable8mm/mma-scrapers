<?php

namespace Cable8mm\MmaScrapers\Promotion\BlackCombat;

use Cable8mm\MmaScrapers\Contract\HttpClientInterface;
use Cable8mm\MmaScrapers\Contract\Scraper;
use Cable8mm\MmaScrapers\Parser\BlackCombatEventParser;

class BlackCombatEventsScraper implements Scraper
{
    private const EVENTS_URL = 'https://www.blackcombat-official.com/event.php';

    public function __construct(
        private HttpClientInterface $http,
        private BlackCombatEventParser $parser
    ) {
    }

    /**
     * @inheritDoc
     */
    public function scrape(?string $url = self::EVENTS_URL): array
    {
        $html = $this->http->get($url);

        return $this->parser->parseEvents($html);
    }
}
