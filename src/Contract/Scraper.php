<?php

namespace Cable8mm\MmaScrapers\Contract;

interface Scraper
{
    /**
     * @return iterable
     */
    public function scrape(?string $url): iterable;
}
