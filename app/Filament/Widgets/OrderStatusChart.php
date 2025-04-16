<?php
 
namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class OrderStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Tình trạng đơn hàng';

    protected function getData(): array
    {
        return [
            'labels' => ['Đang xử lý', 'Đã giao', 'Đã hủy'],
            'datasets' => [[
                'data' => [
                    Order::where('status', 'đang xử lý')->count(),
                    Order::where('status', 'đã giao')->count(),
                    Order::where('status', 'đã hủy')->count(),
                ],
                'backgroundColor' => ['#3b82f6', '#22c55e', '#ef4444'],  
            ]],
        ];
    }

    protected function getType(): string
    {
        return 'pie';  
    }
}
