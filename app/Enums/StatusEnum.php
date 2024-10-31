<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusEnum implements HasLabel
{
    case DRAFT;
    case REVIEWING;
    case PUBLISHED;

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::REVIEWING => 'Reviewing',
            self::PUBLISHED => 'Published',
        };
    }
}
