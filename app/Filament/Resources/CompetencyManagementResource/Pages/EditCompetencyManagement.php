<?php

namespace App\Filament\Resources\CompetencyManagementResource\Pages;

use App\Filament\Resources\CompetencyManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompetencyManagement extends EditRecord
{
    protected static string $resource = CompetencyManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
