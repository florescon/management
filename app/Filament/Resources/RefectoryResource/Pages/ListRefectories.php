<?php

namespace App\Filament\Resources\RefectoryResource\Pages;

use App\Filament\Resources\RefectoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefectories extends ListRecords
{
    protected static string $resource = RefectoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
