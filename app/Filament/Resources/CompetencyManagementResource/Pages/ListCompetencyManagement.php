<?php

namespace App\Filament\Resources\CompetencyManagementResource\Pages;

use App\Filament\Resources\CompetencyManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompetencyManagement extends ListRecords
{
    protected static string $resource = CompetencyManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
