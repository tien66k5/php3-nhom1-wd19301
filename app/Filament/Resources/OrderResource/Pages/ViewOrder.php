<?php
namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    public function getView(): string
    {
        return 'filament.resources.order.view';
    }
}

