<?php

namespace App\Filament\Personal\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Timesheet;
use Carbon\Carbon;


class PersonalWidgetStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending holidays', $this->getPendingHolidays(Auth::user())),
            Stat::make('Approved holidays', $this->getApprovedHolidays(Auth::user())),
            Stat::make('Total Work', $this->getTotalWork(Auth::user())),
        ];
    }

    protected function getPendingHolidays(User $user)
    {
        $totalPendingHolidays = Holiday::where('user_id', $user->id)
            ->where('type', 'pending')->count();
        return $totalPendingHolidays;
    }
    protected function getApprovedHolidays(User $user)
    {
        $totalApprovedHolidays = Holiday::where('user_id', $user->id)
            ->where('type', 'approved')->count();
        return $totalApprovedHolidays;
    }
    protected function getTotalWork(User $user)
    {
        $timesheets = Timesheet::where('user_id', $user->id)
            ->where('type', 'work')->get();

        $sumSeconds = 0;
        foreach ($timesheets as $timesheet) {
            $startTime = Carbon::parse($timesheet->day_in);
            $finishTime = Carbon::parse($timesheet->day_out);

            $totalDuration = $finishTime->diffInSeconds($startTime);
            $sumSeconds = $sumSeconds + $totalDuration;
        }
        $tiempoFormato = gmdate('H:i:s', $sumSeconds);
        return $tiempoFormato;
    }
}
