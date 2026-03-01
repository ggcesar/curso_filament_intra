<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Timesheet;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
            $totalEmployees = User::all()->count();
            $totalHoliday = Holiday::where('type', 'pending')->count();
            $totalTimesheet = Timesheet::all()->count();
            return [
            //
            Stat::make('Employees', $totalEmployees)
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Holidays', $totalHoliday),
            Stat::make('Timesheets', $totalTimesheet),
             Stat::make('Unique views', '192.1k')
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
        ];
    }
}
