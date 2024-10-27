<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UserOverview extends ChartWidget
{
    protected static ?string $heading = 'User';
    protected static ?int $sort = -2;

    protected static bool $isLazy = false;
    protected function getData(): array
    {
        return [
            User::count(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
