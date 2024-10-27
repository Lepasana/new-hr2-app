<?php

namespace App\Filament\Resources\TrainingManagementResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\TrainingManagement;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class TrainingManagementOverview extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                TrainingManagement::query()->with('employee')
            )
            ->columns([
                TextColumn::make('employee.name')
            ]);
    }
}
