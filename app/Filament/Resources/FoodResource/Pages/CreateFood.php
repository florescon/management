<?php

namespace App\Filament\Resources\FoodResource\Pages;

use App\Filament\Resources\FoodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFood extends CreateRecord
{
    protected static string $resource = FoodResource::class;
}
