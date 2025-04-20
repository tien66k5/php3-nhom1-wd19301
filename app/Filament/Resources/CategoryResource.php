<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\Action;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $pluralLabel = 'Danh mục chính';
    public static function form(Forms\Form $form): Forms\Form
{
    return $form->schema([
        TextInput::make('name')
    ->label('Tên danh mục')
    ->required()
    ->rules(['required', 'string', 'min:1'])
    ->validationMessages([
        'required' => 'Vui lòng nhập tên danh mục',
        'min' => 'Tên danh mục không được để trống',
    ]),



        Toggle::make('status')
            ->label('Trạng thái')
            ->default(true),

        Repeater::make('categoryValues')
            ->relationship('categoryValues')
            ->label('Danh mục con')
            ->schema([
                TextInput::make('name')
                    ->label('Tên danh mục con')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập tên danh mục con',
                    ]),

                Toggle::make('status')
                    ->label('Trạng thái')
                    ->default(true),
            ])
           
            
    ]);
}


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable(),
            Tables\Columns\IconColumn::make('status')
                ->boolean()
                ->sortable(),

        ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
           
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
