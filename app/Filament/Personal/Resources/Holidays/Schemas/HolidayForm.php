<?php

namespace App\Filament\Personal\Resources\Holidays\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class HolidayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('calendar_id')
                    ->relationship('calendar', 'name')
                    ->required(),
                DatePicker::make('day')
                    ->required(),
            ]);
    }
}
