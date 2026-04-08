<?php

namespace Cable8mm\MmaScrapers\Http;

interface HttpClientInterface
{
    public function get(string $url): self;

    public function getBody(): string;
}
