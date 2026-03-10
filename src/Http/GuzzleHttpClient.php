<?php

namespace Cable8mm\MmaScrapers\Http;

use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 10,
            'headers' => [
                'User-Agent' => 'MMA Scraper Bot',
            ],
        ]);
    }

    public function get(string $url): string
    {
        $response = $this->client->get($url);

        return (string) $response->getBody();
    }
}
