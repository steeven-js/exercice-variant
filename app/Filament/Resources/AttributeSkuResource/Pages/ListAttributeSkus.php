<?php

namespace App\Filament\Resources\AttributeSkuResource\Pages;

use App\Filament\Resources\AttributeSkuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributeSkus extends ListRecords
{
    protected static string $resource = AttributeSkuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
