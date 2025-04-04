<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryValueResource\Pages;
use App\Models\CategoryValue;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class CategoryValueResource extends Resource
{
    protected static ?string $model = CategoryValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Tên danh mục con'),

                Select::make('category_id')
                    ->label('Danh mục cha')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),

                Toggle::make('status')
                    ->label('Trạng thái')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('name')->searchable()->label('Tên danh mục con'),
                
                TextColumn::make('category.name')
                    ->label('Danh mục cha')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('status')
                    ->label('Trạng thái')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
            
                SelectFilter::make('category_id')
                    ->label('Lọc theo danh mục cha')
                    ->relationship('category', 'name')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryValues::route('/'),
            'create' => Pages\CreateCategoryValue::route('/create'),
            'edit' => Pages\EditCategoryValue::route('/{record}/edit'),
        ];
    }
}
