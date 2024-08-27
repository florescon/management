<?php

namespace App\Filament\Resources\RefectoryResource\Pages;

use App\Filament\Resources\RefectoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefectory extends EditRecord
{
    protected static string $resource = RefectoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
