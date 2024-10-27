<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\LearningManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LearningManagementResource\Pages;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\LearningManagementResource\RelationManagers;

class LearningManagementResource extends Resource
{
    protected static ?string $model = LearningManagement::class;
    protected static ?string $navigationGroup = 'Learning Management';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TinyEditor::make('content')
                   ->showMenuBar()
                   ->maxHeight(500)
                   ->minHeight(500)
                   ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLearningManagement::route('/'),
            'create' => Pages\CreateLearningManagement::route('/create'),
            'edit' => Pages\EditLearningManagement::route('/{record}/edit'),
        ];
    }
}
