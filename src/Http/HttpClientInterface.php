<?php

namespace Cable8mm\MmaScrapers\Http;

interface HttpClientInterface
{
    public function get(string $url): string;
}
