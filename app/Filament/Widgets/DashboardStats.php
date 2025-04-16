<?php
namespace App\Filament\Widgets;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryValue;
use App\Models\Product;
use App\Models\Order;
use App\Models\Comment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Tổng Brand', Brand::count()),
            Stat::make('Tổng Danh mục', Category::count()),
            Stat::make('Tổng Category Values', CategoryValue::count()),
            Stat::make('Tổng Sản phẩm', Product::count()),
            Stat::make('Đơn đã bán', Order::where('status', 'đã giao')->count()),
            Stat::make('Doanh thu', number_format(Order::where('status', 'đã giao')->sum('total_price')) . ' ₫'),

            Stat::make('Đơn hôm nay', Order::whereDate('created_at', today())->count()),

            Stat::make('Đơn bị hủy', Order::where('status', 'đã hủy')->count()),

            Stat::make('Sắp hết hàng', DB::table('product_skus')->where('quantity', '<', 5)->count()),
        ];
    }
}
