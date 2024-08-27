<?php

namespace App\Filament\Resources\ZoneResource\Pages;

use App\Filament\Resources\ZoneResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageZones extends ManageRecords
{
    protected static string $resource = ZoneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
