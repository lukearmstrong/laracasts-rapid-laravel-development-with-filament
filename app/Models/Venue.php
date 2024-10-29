<?php

namespace App\Models;

use App\Enums\RegionEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'city' => 'string',
        'country' => 'string',
        'postal_code' => 'string',
        'region' => RegionEnum::class
    ];

    public function conferences(): HasMany
    {
        return $this->hasMany(Conference::class);
    }

    public static function getForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('city')
                ->required()
                ->maxLength(255),
            TextInput::make('country')
                ->required()
                ->maxLength(255),
            TextInput::make('postal_code')
                ->required()
                ->maxLength(255),
            Select::make('region')
                ->enum(RegionEnum::class)
                ->options(RegionEnum::class),
        ];
    }
}
