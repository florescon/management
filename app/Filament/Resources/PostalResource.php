<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostalResource\Pages;
use App\Filament\Resources\PostalResource\RelationManagers;
use App\Models\Postal;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostalResource extends Resource
{
    protected static ?string $model = Postal::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string
    {
        return __('Postal Codes');
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
                                Forms\Components\TextInput::make('code')
                                    ->label(__('Code'))
                                    ->required()
                                    ->length(5),
                                Forms\Components\TextInput::make('description')
                                    ->label(__('Description'))
                                    ->required()
                                    ->minLength(1)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('price')
                                    ->label(__('Price'))
                                    ->required()
                                    ->integer()
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('coverage')
                                    ->label(__('Coverage'))
                                    ->required(),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label(__('Code'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('Description'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('Price'))
                    ->sortable(),
                Tables\Columns\IconColumn::make('coverage')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle')                
                    ->label(__('Coverage'))
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListPostals::route('/'),
            'create' => Pages\CreatePostal::route('/create'),
            'edit' => Pages\EditPostal::route('/{record}/edit'),
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
