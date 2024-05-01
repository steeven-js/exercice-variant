<?php

namespace App\Filament\Resources\AttributeSkuResource\Pages;

use App\Filament\Resources\AttributeSkuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttributeSku extends EditRecord
{
    protected static string $resource = AttributeSkuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
