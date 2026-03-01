<?php

namespace App\Filament\Personal\Resources\Timesheets;

use App\Filament\Personal\Resources\Timesheets\Pages\CreateTimesheet;
use App\Filament\Personal\Resources\Timesheets\Pages\EditTimesheet;
use App\Filament\Personal\Resources\Timesheets\Pages\ListTimesheets;
use App\Filament\Personal\Resources\Timesheets\Schemas\TimesheetForm;
use App\Filament\Personal\Resources\Timesheets\Tables\TimesheetsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Timesheet;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use UnitEnum;
use Illuminate\Support\Facades\Auth;

class TimesheetResource extends Resource
{
    protected static ?string $model = Timesheet::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-table-cells';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'day_in';
    
    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function form(Schema $schema): Schema
    {
        return TimesheetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TimesheetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTimesheets::route('/'),
            'create' => CreateTimesheet::route('/create'),
            'edit' => EditTimesheet::route('/{record}/edit'),
        ];
    }
}
