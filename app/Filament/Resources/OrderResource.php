<?php
namespace App\Filament\Resources;

use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\OrderResource\Pages;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Đơn hàng';
    protected static ?string $pluralModelLabel = 'Đơn hàng';
    protected static ?string $modelLabel = 'Đơn hàng';

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->with(['user', 'address', 'details.productSku.product']);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Mã đơn'),
                Tables\Columns\TextColumn::make('user.name')->label('Khách hàng'),
                Tables\Columns\TextColumn::make('user.phone')->label('Số điện thoại'),
                Tables\Columns\TextColumn::make('address.address')->label('Địa chỉ giao hàng'),
                Tables\Columns\TextColumn::make('total_price')->money('VND')->label('Tổng tiền'),
                Tables\Columns\TextColumn::make('status')->label('Trạng thái'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y H:i'),

                Tables\Columns\TextColumn::make('product_names')
                    ->label('Sản phẩm')
                    ->getStateUsing(function ($record) {
                        return $record->details
                            ->map(function ($detail) {
                                return optional($detail->productSku?->product)->name;
                            })
                            ->filter()
                            ->join(', ');
                    })
                    ->wrap()
                    ->limit(50),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
            
                Action::make('xem_chi_tiet')
                    ->label('Xem chi tiết')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Chi tiết đơn hàng')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Đóng')
                    ->modalContent(function ($record) {
                        $details = $record->details;
                        $orders = Order::with(['user', 'address', 'details.productSku.product'])->get();
                        return view('filament.resources.order.view', compact('orders')  );
                    }),
                ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
