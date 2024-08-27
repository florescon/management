<?php

namespace App\Filament\Resources\PostalResource\Pages;

use App\Filament\Resources\PostalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostals extends ListRecords
{
    protected static string $resource = PostalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
