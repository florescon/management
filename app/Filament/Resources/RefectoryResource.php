<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefectoryResource\Pages;
use App\Filament\Resources\RefectoryResource\RelationManagers;
use App\Models\Refectory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefectoryResource extends Resource
{
    protected static ?string $model = Refectory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string
    {
        return __('Refectories');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Parameters');
    }

    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('Name'))
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('note')
                                    ->label(__('Note'))
                                    ->required()
                                    ->minLength(1)
                                    ->maxLength(255),
                                Forms\Components\Select::make('zone_id')
                                    ->relationship('zone', 'name')
                                    ->label(__('Zone'))
                                    ->required()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label(__('Zone'))
                                            ->required()
                                    ])
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->label(__('Note'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('zone.name')
                    ->label(__('Zone'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListRefectories::route('/'),
            'create' => Pages\CreateRefectory::route('/create'),
            'edit' => Pages\EditRefectory::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
