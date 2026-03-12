<?php

namespace Cable8mm\MmaScrapers\Normalizers;

use Cable8mm\MmaScrapers\Enums\FightMethod;

class FightMethodNormalizer
{
    public static function normalize(string $method): ?FightMethod
    {
        $method = strtolower($method);

        if ($method === 'ko') {
            return FightMethod::KO;
        }

        if ($method === 'tko') {
            return FightMethod::TKO;
        }

        if ($method === 'submission') {
            return FightMethod::SUBMISSION;
        }

        if ($method === 'decision') {
            return FightMethod::DECISION;
        }

        if ($method === 'dq' || $method === 'disqualification') {
            return FightMethod::DQ;
        }

        if ($method === 'nc' || $method === 'no contest') {
            return FightMethod::NC;
        }

        return null;
    }
}
