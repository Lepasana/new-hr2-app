<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DurationResource\Pages;
use App\Filament\Resources\DurationResource\RelationManagers;
use App\Models\Duration;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DurationResource extends Resource
{
    protected static ?string $model = Duration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationGroup = "Training Management";
    protected static ?string $navigationLabel = 'Training Duration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                  ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                  ->sortable()
                  ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDurations::route('/'),
            'create' => Pages\CreateDuration::route('/create'),
            'edit' => Pages\EditDuration::route('/{record}/edit'),
        ];
    }
}
