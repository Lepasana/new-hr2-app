<?php

namespace App\Filament\Resources\SuccessionPlanningResource\Widgets;

use App\Models\Employee;
use App\Models\SuccessionPlanning;
use App\Models\TrainingManagement;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SuccessionOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('No. of Successor', SuccessionPlanning::count())
                ->description('Total Number of Successors')
                ->descriptionIcon('heroicon-m-users'),

            Stat::make('Total Employees', Employee::count())
                ->description('Total Number of Employees')
                ->descriptionIcon('heroicon-m-user-group'),

                Stat::make('No. of Trainings', TrainingManagement::count())
                ->description('Total Number of Trainings')
                ->descriptionIcon('heroicon-m-user-group'),
        ];
    }
}
