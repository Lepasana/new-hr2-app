<?php

namespace App\Filament\Resources;

use App\Enums\TrainingStatusEnum;
use App\Filament\Resources\TrainingManagementResource\Pages;
use App\Filament\Resources\TrainingManagementResource\RelationManagers;
use App\Models\TrainingManagement;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainingManagementResource extends Resource
{
  protected static ?string $model = TrainingManagement::class;

  protected static ?string $navigationIcon = 'heroicon-o-document-currency-bangladeshi';

  protected static ?string $navigationGroup = "Training Management";
  protected static ?string $navigationLabel = 'Training Management';


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('training_name')
          ->label('Training Name')
          ->required(),

        Select::make('employee_id')
          ->relationship('employee', 'name')
          ->preload()
          ->createOptionForm([
            TextInput::make('name')
              ->required()
          ])
          ->required(),

        DatePicker::make('training_date')
          ->label('Training Date')
          ->required(),

        Select::make('duration_id')
          ->relationship('duration', 'title')
          ->preload()
          ->createOptionForm([
            TextInput::make('title')
              ->required()
          ])
          ->required(),

        Select::make('status')
          ->options(TrainingStatusEnum::toOptions())
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('training_name')
          ->label('Training Name')
          ->sortable()
          ->searchable(),

        TextColumn::make('employee.name')
          ->label('Employee Name')
          ->sortable()
          ->searchable(),

        TextColumn::make('training_date')
          ->label('Training Date')
          ->sortable()
          ->searchable(),

        TextColumn::make('duration.title')
          ->label('Duration')
          ->sortable()
          ->searchable(),

        TextColumn::make('status')
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
      'index' => Pages\ListTrainingManagement::route('/'),
      'create' => Pages\CreateTrainingManagement::route('/create'),
      'edit' => Pages\EditTrainingManagement::route('/{record}/edit'),
    ];
  }
}
