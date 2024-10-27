<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
  protected static ?string $model = Employee::class;
  protected static bool $shouldRegisterNavigation = false;
  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
  protected static ?string $navigationGroup = 'Employee Management';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('name')
          ->required()
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([

        TextColumn::make('id')
          ->label('Employee ID')
          ->sortable()
          ->searchable(),

        TextColumn::make('name')
          ->sortable()
          ->searchable()
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
      'index' => Pages\ListEmployees::route('/'),
      'create' => Pages\CreateEmployee::route('/create'),
      'edit' => Pages\EditEmployee::route('/{record}/edit'),
    ];
  }
}
