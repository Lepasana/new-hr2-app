<?php

namespace App\Filament\Resources\TrainingManagementResource\Pages;

use App\Filament\Resources\TrainingManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainingManagement extends EditRecord
{
    protected static string $resource = TrainingManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
