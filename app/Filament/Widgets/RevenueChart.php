<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Carbon;
use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Thống kê doanh thu';

    public ?string $filter = 'this_month';

    protected function getData(): array
    {
        $startDate = now();
        $endDate = now();

        switch ($this->filter) {
            case 'this_week':
                $startDate = now()->startOfWeek();
                $endDate = now()->endOfWeek();
                break;
            case 'this_month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            case 'this_year':
                $startDate = now()->startOfYear();
                $endDate = now()->endOfYear();
                break;
        }

        $filter = $this->filter;

        $orders = Order::where('status', 'đã giao')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($order) use ($filter) {
                return match ($filter) {
                    'this_year' => \Carbon\Carbon::parse($order->created_at)->format('M'),
                    'this_month' => \Carbon\Carbon::parse($order->created_at)->format('d'),
                    'this_week' => \Carbon\Carbon::parse($order->created_at)->format('l'),
                    default => \Carbon\Carbon::parse($order->created_at)->format('d'),
                };
            });


        $labels = [];
        $data = [];

        foreach ($orders as $key => $group) {
            $labels[] = $key;
            $data[] = $group->sum('total_price');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'this_week' => 'Tuần này',
            'this_month' => 'Tháng này',
            'this_year' => 'Năm nay',
        ];
    }
    protected function getType(): string
    {
        return 'line';  
    }
}
