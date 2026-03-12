<?php

namespace Cable8mm\MmaScrapers\Normalizers;

use Cable8mm\MmaScrapers\Enums\FightStatus;

class FightStatusNormalizer
{
    public static function normalize(string $value): FightStatus
    {
        $value = strtolower(trim($value));

        return match (true) {
            $value === 'live' => FightStatus::LIVE,
            $value === 'final',
            $value === 'result',
            $value === 'completed',
            $value === 'finished' => FightStatus::FINISHED,
            default => FightStatus::SCHEDULED,
        };
    }
}
