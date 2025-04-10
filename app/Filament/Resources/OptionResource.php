<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OptionResource\Pages;
use App\Filament\Resources\OptionResource\Pages\ViewOption;
use App\Filament\Resources\OptionResource\RelationManagers;
use App\Models\Option;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Thuộc tính sản phẩm';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên thuộc tính'),
                        Repeater::make('optionValues')
                            ->label('Giá trị thuộc tính')
                            ->relationship('optionValues')
                            ->schema([
                                TextInput::make('value_name')
                                    ->label('Tên giá trị'),
                            ])
                            ->deletable()->addable(),
                    ])
                    ->columns(2),
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
                TextColumn::make('name')->label('Tên thuộc tính'),
                TextColumn::make('optionValues.value_name')->label('Giá trị')->limit(3),
                IconColumn::make('status')
                    ->label('Trạng thái')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Xem chi tiết'),
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
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
            'view' => ViewOption::route('{record}')
        ];
    }
}
