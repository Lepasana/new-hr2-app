<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Ess extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.ess';

    protected static ?string $navigationLabel = 'Employee Self Service';
    protected static ?string $navigationGroup = "ESS";

}
