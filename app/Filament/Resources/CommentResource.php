<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Bình luận đánh giá';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')
                ->label('ID')
                ->searchable()
                ->sortable(),

            TextColumn::make('user.name') // Lấy tên người dùng từ comment hoặc rating
                ->label('Tên người dùng')
                ->formatStateUsing(fn ( $state,$record) => 
                    $record->comment ? $record->comment->user->name : 
                    ($record->rating ? $record->rating->user->name : 'Chưa có tên người dùng')
                )
                ->sortable(),

            TextColumn::make('product.name')
                ->label('Sản phẩm')
                ->searchable()
                ->sortable(),

            TextColumn::make('rating.rating')
                ->label('Sao đánh giá')
                ->sortable()
                ->formatStateUsing(fn ($state, $record) => 
                    $record->rating ? str_repeat('⭐', (int) $record->rating->rating) . str_repeat('☆', 5 - (int) $record->rating->rating) : 'Chưa có đánh giá'
                )
                ->html(),

            TextColumn::make('rating.preview')
                ->label('Nội dung đánh giá')
                ->limit(50),

                TextColumn::make('content')
                ->label('Nội dung bình luận')
                ->formatStateUsing(fn ($state, $record) =>
                    $record->comment ? $record->comment->content : 'Không có bình luận'
                )
                ->limit(50),
            

            TextColumn::make('status')
                ->label('Trạng thái')
                ->colors([
                    'warning' => 2,
                    'success' => 1,
                    'danger' => 0,
                ])
                ->formatStateUsing(fn ($state) => match ($state) {
                    2 => 'Chờ duyệt',
                    1 => 'Đã duyệt',
                    0 => 'Từ chối',
                }),

            TextColumn::make('created_at')
                ->label('Ngày tạo')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
