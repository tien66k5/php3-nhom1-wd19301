<?php
namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\CategoryValue;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms;
use Filament\Tables;

class CategoryValueRelationManager extends RelationManager
{
 
    protected static string $relationship = 'categoryValues';  

 
    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(), 
            Forms\Components\Toggle::make('status')->default(true),  
        ]);
    }

 
    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable(),
            Tables\Columns\BooleanColumn::make('status')->sortable(),
        ]);
    }
}
