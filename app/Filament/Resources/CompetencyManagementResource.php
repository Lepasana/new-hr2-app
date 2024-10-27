<?php

namespace App\Filament\Resources;

use App\Enums\SkillLevelEnum;
use App\Filament\Resources\CompetencyManagementResource\Pages;
use App\Filament\Resources\CompetencyManagementResource\RelationManagers;
use App\Models\CompetencyManagement;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetencyManagementResource extends Resource
{
    protected static ?string $model = CompetencyManagement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Competency Management";
    protected static ?string $navigationLabel = 'Competency Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('employee_id')
                    ->relationship('employee', 'name')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                    ])
                    ->required(),

                TextInput::make('competency')
                    ->required(),

                Select::make('skill_level')
                    ->label('Skill Level')
                    ->options(SkillLevelEnum::toOptions())
                    ->required(),

                TextInput::make('proficiency')
                    ->required(),

                Textarea::make('notes')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.name')
                    ->label('Employee Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('competency')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('skill_level')
                    ->label('Skill Level')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('proficiency')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('notes')
                    ->words(3)
                    ->limit(10)
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListCompetencyManagement::route('/'),
            'create' => Pages\CreateCompetencyManagement::route('/create'),
            'edit' => Pages\EditCompetencyManagement::route('/{record}/edit'),
        ];
    }
}
