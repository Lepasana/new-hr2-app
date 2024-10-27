<?php

namespace App\Filament\Resources\SuccessionPlanningResource\Pages;

use App\Filament\Resources\SuccessionPlanningResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuccessionPlanning extends EditRecord
{
    protected static string $resource = SuccessionPlanningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
