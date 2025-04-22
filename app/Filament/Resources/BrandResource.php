<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $pluralLabel = 'Thương hiệu';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            TextInput::make('name')
                ->label('Tên thương hiệu')
                ->required()
                ->maxLength(255)
                ->validationMessages([
                    'required' => 'Vui lòng nhập tên thương hiệu',
                    'max' => 'Tên thương hiệu không được vượt quá 255 ký tự',
                ]),

            FileUpload::make('image')
                ->label('Hình ảnh')
                ->image()
                ->directory('brands')
                ->required()
                ->validationMessages([
                    'required' => 'Vui lòng chọn hình ảnh cho thương hiệu',
                    'image' => 'Tệp tải lên phải là hình ảnh',
                ]),

            Toggle::make('status')
                ->label('Trạng thái')
                ->default(true),

            Textarea::make('description')
                ->label('Mô tả')
                ->rows(3)
                
                ->maxLength(1000)
                ->validationMessages([
                    'max' => 'Mô tả không được vượt quá 1000 ký tự',
                    
                ]),
        ]);
}


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Tên thương hiệu')
                    ->sortable()->searchable(),
                ImageColumn::make('image')->label('Hình ảnh')
                    ->circular(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Trạng thái')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('description')->label('Mô tả')
                    ->limit(50),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->label('Sửa'),
                Tables\Actions\DeleteAction::make()->label('Xóa'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
