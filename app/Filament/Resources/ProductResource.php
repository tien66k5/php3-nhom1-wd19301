<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductSku;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

use function Laravel\Prompts\select;
use App\Models\Brand;
use Filament\Tables\Columns\IconColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $pluralLabel = 'Sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->unique(),
                        Select::make('brand_id')
                            ->label('Thương hiệu')
                            ->relationship('brand', 'name'),
                        Select::make('category_id')
                            ->label('Phân loại ')
                            ->relationship('category', 'name'),
                            TextInput::make('discount')
                            ->label('Giảm giá %')
                    ])
                    ->columns(4),
                Textarea::make('short_description')
                    ->rows(5)
                    ->label('Mô tả ngắn'),
                FileUpload::make('images')
                    ->label('Ảnh sản phẩm')
                    ->rules('required')
                    ->image()
                    ->multiple()
                    ->maxFiles(5)
                    ->panelLayout('grid')
                    ->panelAspectRatio('1:1'),
                RichEditor::make('description')
                    ->label('Mô tả')
                    ->columnSpanFull(),
                Repeater::make('productSkus')->relationship()->schema([
                    Section::make()
                        ->schema([
                            TextInput::make('sku')
                                ->label('Mã SKU'),
                            TextInput::make('quantity')
                                ->numeric()
                                ->label('Số lượng'),
                                TextInput::make('price')
                                ->label('Giá')
                                ->numeric()
                        ])->columns(3),

                    Repeater::make('skuValues')
                        ->relationship('skuValues')
                        ->label('Thuộc tính')
                        ->schema([
                            Select::make('option_id')
                                ->label('Thuộc tính')
                                ->options(Option::pluck('name', 'id'))
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('value_id', null))
                                ->searchable(),
                            Select::make('value_id')
                                ->label('Giá trị')
                                ->options(
                                    fn(callable $get) =>
                                    $get('option_id') ? OptionValue::where('option_id', $get('option_id'))->pluck('value_name', 'id') : []
                                )
                                ->searchable(),
                            
                        ])
                        ->columns(3)
                        ->columnSpanFull(),
                    FileUpload::make('images')
                        ->label('Hình ảnh')
                        ->image()
                        ->columnSpanFull(),
                ])->defaultItems(1)
                    ->addable(true)
                    ->deletable(true)
                    ->label('Biến thể')
                    ->rules(['min:1'])
                    ->columns(2)
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->label('Trạng thái')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('name')->label('Tên'),
                TextColumn::make('total_quantity')->label('Tổng số lượng')->getStateUsing(function ($record) {
                    return ProductSku::where('product_id', $record->id)->sum('quantity');
                }),
                TextColumn::make('brands.name')
                    ->label('Tên thương hiệu'),
                TextColumn::make('variant')->label('Biến thể')->getStateUsing(fn($record) => ProductSku::where('product_id', $record->id)->count('sku')),
               IconColumn::make('status')
                    ->label('Trạng thái')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('brand_id')->options(Brand::all()->pluck('name', 'id'))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
