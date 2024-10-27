<?php

namespace App\Filament\Resources\LearningManagementResource\Pages;

use App\Filament\Resources\LearningManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearningManagement extends EditRecord
{
    protected static string $resource = LearningManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
