# MMA Scrapers

[![build & tests](https://github.com/cable8mm/mma-scrapers/actions/workflows/run-tests.yml/badge.svg)](https://github.com/cable8mm/mma-scrapers/actions/workflows/run-tests.yml)
[![coding style](https://github.com/cable8mm/mma-scrapers/actions/workflows/code-style.yml/badge.svg)](https://github.com/cable8mm/mma-scrapers/actions/workflows/code-style.yml)
[![minimum PHP version](https://img.shields.io/badge/php-%5E8.4-8892BF?logo=php)](https://github.com/cable8mm/mma-scrapers)

## Functions

- [x] multi-source aggregator
- [x] identity resolution
- [x] normalized DB
- [x] 확장 가능 구조

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
Scraper
   ↓
Parser
   ↓
DTO
   ↓
Matcher
   ↓
Deduplicator
   ↓
Aggregator
   ↓
DB (지금 설계)
```

FightDTO:

```txt
여러 source에서 수집된 FightDTO[]
   ↓
같은 경기끼리 그룹핑
   ↓
FightAggregator로 merge
   ↓
최종 FightDTO[]
```

## Knowledge

### Architecture

```txt
events
 └ fights
      ├ fighters (red / blue)
      ├ fight_external_ids
      └ (aggregated data)

fighters
 ├ fighter_aliases
 └ fighter_external_ids
```

```txt
"raw → normalized → aggregated → stored"
```

fighters table:

```php
Schema::create('fighters', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('nickname')->nullable();
    $table->string('instagram')->nullable();
    $table->string('teamname')->nullable();
    $table->string('height')->nullable();

    $table->integer('win')->nullable();
    $table->integer('lose')->nullable();
    $table->integer('draw')->nullable();

    $table->timestamps();
});
```

```php
// 정찬성 = Chan Sung Jung = Korean Zombie
Schema::create('fighter_aliases', function (Blueprint $table) {
    $table->id();

    $table->foreignId('fighter_id')->constrained()->cascadeOnDelete();
    $table->string('alias')->index();

    $table->timestamps();
});
```

```php
// fighter_id = 1
// source = sherdog
// external_id = 12345
Schema::create('fighter_external_ids', function (Blueprint $table) {
    $table->id();

    $table->foreignId('fighter_id')->constrained()->cascadeOnDelete();

    $table->string('source'); // sherdog, tapology
    $table->string('external_id');

    $table->unique(['source', 'external_id']);

    $table->timestamps();
});
```

```php
Schema::create('events', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('location')->nullable();

    $table->dateTime('event_date')->index();

    $table->timestamps();
});
```

```php
Schema::create('event_external_ids', function (Blueprint $table) {
    $table->id();

    $table->foreignId('event_id')->constrained()->cascadeOnDelete();

    $table->string('source');
    $table->string('external_id');

    $table->unique(['source', 'external_id']);
});
```

```php
Schema::create('fights', function (Blueprint $table) {
    $table->id();

    $table->foreignId('event_id')->constrained()->cascadeOnDelete();

    $table->foreignId('fighter_red_id')->constrained('fighters');
    $table->foreignId('fighter_blue_id')->constrained('fighters');

    $table->string('weight_class')->nullable();
    $table->string('method')->nullable();

    $table->integer('round')->nullable();
    $table->string('time')->nullable();

    $table->foreignId('winner_id')->nullable()->constrained('fighters')->nullOnDelete();

    $table->dateTime('fight_date')->index();

    $table->enum('status', [
        'scheduled', 'live', 'finished'
        ])->default('scheduled');

    $table->boolean('is_title_fight')->default(false);

    $table->timestamps();

    // 🔥 핵심 (순서 뒤집힘 대응)
    $table->unique([
        'fighter_red_id',
        'fighter_blue_id',
        'fight_date',
    ]);
});
```

```php
Schema::create('fight_external_ids', function (Blueprint $table) {
    $table->id();

    $table->foreignId('fight_id')->constrained()->cascadeOnDelete();

    $table->string('source');
    $table->string('external_id');

    $table->unique(['source', 'external_id']);
});
```

## Test

```sh
composer test
```
