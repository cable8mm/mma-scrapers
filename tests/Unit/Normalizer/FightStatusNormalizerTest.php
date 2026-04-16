<?php

namespace Tests\Unit\Normalizer;

use Cable8mm\MmaScrapers\Enum\FightStatus;
use Cable8mm\MmaScrapers\Normalizer\FightStatusNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(FightStatusNormalizer::class)]
class FightStatusNormalizerTest extends TestCase
{
    #[Test]
    public function test_normalize(): void
    {
        $items = FightStatus::cases();

        foreach ($items as $item) {
            $this->assertEquals($item, FightStatusNormalizer::normalize($item->value));
        }

        $this->assertEquals(FightStatus::SCHEDULED, FightStatusNormalizer::normalize('unknown status'));
    }
}
