<?php

namespace App\Filament\Resources\Countries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CountriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('iso2')
                    ->label('ISO2')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('iso3')
                    ->label('ISO3')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone_code')
                    ->label('Phone Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('region')
                    ->label('Region')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('emoji')
                    ->label('Flag'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
