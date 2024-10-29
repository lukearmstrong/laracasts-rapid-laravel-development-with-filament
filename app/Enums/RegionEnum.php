<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RegionEnum implements HasLabel
{
    case US;
    case EUROPE;
    case AUSTRALIA;
    case INDIA;
    case ONLINE;

    public function getLabel(): string
    {
        return match ($this) {
            self::US => 'US',
            self::EUROPE => 'Europe',
            self::AUSTRALIA => 'Australia',
            self::INDIA => 'India',
            self::ONLINE => 'Online',
        };
    }
}
