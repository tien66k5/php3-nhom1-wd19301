<?php

namespace App\Filament\Resources\CategoryValueResource\Pages;

use App\Filament\Resources\CategoryValueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryValue extends EditRecord
{
    protected static string $resource = CategoryValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
