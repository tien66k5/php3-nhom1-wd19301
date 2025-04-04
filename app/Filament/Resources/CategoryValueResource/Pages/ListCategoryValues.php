<?php

namespace App\Filament\Resources\CategoryValueResource\Pages;

use App\Filament\Resources\CategoryValueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryValues extends ListRecords
{
    protected static string $resource = CategoryValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
}
