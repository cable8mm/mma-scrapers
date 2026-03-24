# MMA Scrapers

[![build & tests](https://github.com/cable8mm/mma-scrapers/actions/workflows/run-tests.yml/badge.svg)](https://github.com/cable8mm/mma-scrapers/actions/workflows/run-tests.yml)
[![coding style](https://github.com/cable8mm/mma-scrapers/actions/workflows/code-style.yml/badge.svg)](https://github.com/cable8mm/mma-scrapers/actions/workflows/code-style.yml)
[![minimum PHP version](https://img.shields.io/badge/php-%5E8.3-8892BF?logo=php)](https://github.com/cable8mm/mma-scrapers)

## Installation

Installation:

```sh
composer require cable8mm/mma-scrapers
```

## Description

### Scraper Flows

```txt
PromotionScraper
     ↓
EventScraper
     ↓
FightScraper
     ↓
FighterScraper
```

```txt
BlackCombatScraper
   ↓
BlackCombatEventParser
   ↓
BlackCombatFightParser
   ↓
FighterParser
```

### Crawling Flows

```txt
/events
   ↓
/events/black-combat-12
   ↓
fight card
   ↓
fighter links
```

### MMA aggregator's data flows

```txt
source scraper
   ↓
FightDTO
   ↓
FightNormalizer
   ↓
FightAggregator
   ↓
database
```

## Test

```sh
composer test
```
