<?php

namespace App\Filament\Resources\TrainingManagementResource\Pages;

use App\Filament\Resources\TrainingManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainingManagement extends ListRecords
{
    protected static string $resource = TrainingManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
