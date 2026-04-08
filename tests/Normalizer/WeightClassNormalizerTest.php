<?php

namespace Tests\Normalizer\Tapology;

use Cable8mm\MmaScrapers\Enum\WeightClass;
use Cable8mm\MmaScrapers\Normalizer\WeightClassNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(WeightClassNormalizer::class)]
class WeightClassNormalizerTest extends TestCase
{
    #[Test]
    public function test_normalize(): void
    {
        $items = WeightClass::cases();

        foreach ($items as $item) {
            $this->assertEquals($item, WeightClassNormalizer::normalize($item->value));
        }

        $this->assertNull(WeightClassNormalizer::normalize('unknown weight class'));
    }
}
