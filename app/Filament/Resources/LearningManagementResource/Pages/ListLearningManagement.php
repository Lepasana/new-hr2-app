<?php

namespace App\Filament\Resources\LearningManagementResource\Pages;

use App\Filament\Resources\LearningManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLearningManagement extends ListRecords
{
    protected static string $resource = LearningManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
