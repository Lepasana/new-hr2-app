<?php

namespace App\Filament\Resources;

use App\Enums\ReadinessLevelEnum;
use App\Filament\Resources\SuccessionPlanningResource\Pages;
use App\Filament\Resources\SuccessionPlanningResource\RelationManagers;
use App\Models\SuccessionPlanning;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuccessionPlanningResource extends Resource
{
  protected static ?string $model = SuccessionPlanning::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
  protected static ?string $navigationGroup = "Succession Planning";

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

        TextInput::make('current_position')
          ->label('Current Position')
          ->required(),

        TextInput::make('potential_successor')
          ->label('Potential Successor')
          ->required(),

        TextInput::make('development_needs')
          ->label('Development Needs')
          ->required(),

        Select::make('readiness_level')
          ->label('Readiness Level')
          ->options(ReadinessLevelEnum::toOptions())
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('employee.name')
          ->label('Employee Name')
          ->sortable()
          ->searchable(),

        TextColumn::make('current_position')
          ->label('Current Position')
          ->sortable()
          ->searchable(),

        TextColumn::make('potential_successor')
          ->label('Potential Successor')
          ->sortable()
          ->searchable(),

        TextColumn::make('development_needs')
          ->label('Development Needs')
          ->sortable()
          ->searchable(),

        TextColumn::make('readiness_level')
          ->label('Readiness Level')
          ->sortable()
          ->searchable(),
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
      'index' => Pages\ListSuccessionPlannings::route('/'),
      'create' => Pages\CreateSuccessionPlanning::route('/create'),
      'edit' => Pages\EditSuccessionPlanning::route('/{record}/edit'),
    ];
  }
}
