<?php

namespace Cable8mm\MmaScrapers\Contract;

interface HttpClientInterface
{
    public function get(string $url): string;
}
