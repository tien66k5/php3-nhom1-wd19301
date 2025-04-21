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

    protected static ?string $navigationIcon = 'heroicon-o-cube';



    protected static ?string $pluralLabel = 'Sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'required' => 'Vui lòng nhập tên sản phẩm',
                                'unique' => 'Tên sản phẩm đã tồn tại',
                            ]),

                        Select::make('brand_id')
                            ->label('Thương hiệu')
                            ->relationship('brand', 'name')
                            ->required()
                            ->validationMessages([
                                'required' => 'Vui lòng chọn thương hiệu',
                            ]),

                        Select::make('category_id')
                            ->label('Phân loại')
                            ->relationship('category', 'name')
                            ->required()
                            ->validationMessages([
                                'required' => 'Vui lòng chọn phân loại',
                            ]),
                    ])
                    ->columns(3),

                Textarea::make('short_description')
                    ->rows(5)
                    ->label('Mô tả ngắn')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập mô tả ngắn',
                    ]),

                FileUpload::make('images')
                    ->label('Ảnh sản phẩm')
                    ->required()
                    ->image()
                    ->multiple()
                    ->maxFiles(5)
                    ->panelLayout('grid')
                    ->panelAspectRatio('1:1')
                    ->validationMessages([
                        'required' => 'Vui lòng tải lên ít nhất 1 ảnh sản phẩm',
                    ]),

                RichEditor::make('description')
                    ->label('Mô tả')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập mô tả chi tiết',
                    ])
                    ->columnSpanFull(),

                Repeater::make('productSku')
                    ->relationship()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('sku')
                                    ->label('Mã SKU')
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập mã SKU',
                                    ]),

                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->label('Số lượng')
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập số lượng',
                                        'numeric' => 'Số lượng phải là số',
                                        'min' => 'Số lượng không được âm',
                                    ]),

                                TextInput::make('price')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->label('Giá')
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập giá',
                                        'numeric' => 'Giá phải là số',
                                        'min' => 'Giá không được nhỏ hơn 0',
                                    ]),
                            ])
                            ->columns(3),

                        Repeater::make('skuValues')
                            ->relationship('skuValues')
                            ->label('Thuộc tính')
                            ->schema([
                                Select::make('option_id')
                                    ->label('Thuộc tính')
                                    ->options(Option::pluck('name', 'id'))
                                    ->reactive()
                                    ->afterStateUpdated(fn(callable $set) => $set('value_id', null))
                                    ->required()
                                    ->searchable()
                                    ->validationMessages([
                                        'required' => 'Vui lòng chọn thuộc tính',
                                    ]),

                                Select::make('value_id')
                                    ->label('Giá trị')
                                    ->required()
                                    ->options(
                                        fn(callable $get) => $get('option_id') ? OptionValue::where('option_id', $get('option_id'))->pluck('value_name', 'id') : []
                                    )
                                    ->searchable()
                                    ->validationMessages([
                                        'required' => 'Vui lòng chọn giá trị thuộc tính',
                                    ]),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),

                        FileUpload::make('images')
                            ->label('Hình ảnh')
                            ->image()
                            ->required()
                            ->validationMessages([
                                'required' => 'Vui lòng tải hình ảnh cho biến thể',
                            ])
                            ->columnSpanFull(),

                    ])
                    ->defaultItems(1)
                    ->addable(true)
                    ->deletable(true)
                    ->label('Biến thể')
                    ->rules(['min:1'])
                    ->validationMessages([
                        'min' => 'Sản phẩm cần có ít nhất 1 biến thể',
                    ])
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
