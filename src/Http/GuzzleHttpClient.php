<?php

namespace Cable8mm\MmaScrapers\Http;

use Cable8mm\MmaScrapers\Contract\HttpClientInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClient implements HttpClientInterface
{
    private Client $client;

    private ResponseInterface $response;

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
        $this->response = $this->client->get($url);

        return (string) $this->response->getBody();
    }
}
