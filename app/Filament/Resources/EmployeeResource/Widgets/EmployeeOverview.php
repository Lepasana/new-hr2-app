<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Employees', Employee::count())
                ->description('Total Number of Successors')
                ->descriptionIcon('heroicon-m-user-group'),
        ];
    }
}
