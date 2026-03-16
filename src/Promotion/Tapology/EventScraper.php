<?php

namespace Cable8mm\MmaScrapers\Promotion\Tapology;

use Cable8mm\MmaScrapers\DTO\EventDTO;
use Cable8mm\MmaScrapers\Http\HttpClientInterface;
use Cable8mm\MmaScrapers\Parser\EventParser;

class EventScraper
{
    private HttpClientInterface $http;

    private EventParser $parser;

    public function __construct(HttpClientInterface $http, EventParser $parser)
    {
        $this->http = $http;
        $this->parser = $parser;
    }

    public function scrape(string $url): EventDTO
    {
        $html = $this->http->get($url);

        return $this->parser->parse($html->getBody());
    }
}
