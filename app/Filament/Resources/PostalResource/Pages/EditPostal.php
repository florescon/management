<?php

namespace App\Filament\Resources\PostalResource\Pages;

use App\Filament\Resources\PostalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostal extends EditRecord
{
    protected static string $resource = PostalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
