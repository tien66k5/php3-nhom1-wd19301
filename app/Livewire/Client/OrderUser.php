<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderUser extends Component
{
    public function cancelOrder($orderId)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($orderId);


        if ($order->status == 1) {
            $order->status = 0;
            $order->save();
            session()->flash('message', 'Đơn hàng đã được hủy.');
        }
    }

    public function render()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userId = $user->id;

        $orders = Order::with([
            'details.productSku.product.category'
        ])
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        $groupedOrders = [];
        foreach ($orders as $order) {
            foreach ($order->details as $detail) {

                $image = $detail->productSku->product->images ? $detail->productSku->product->images : 'default.jpg';
                $imageName = is_array($image) ? $image[0] : $image;

                $groupedOrders[$order->id][] = [
                    'order_status' => $order->status,
                    'status' => $order->status,
                    'order_price' => $detail->price,
                    'quantity' => $detail->quantity,
                    'product_name' => $detail->productSku->product->name,
                    'category_name' => $detail->productSku->product->category->name ?? '',
                    'image_name' => $imageName
                ];
            }
        }

        return view('livewire.client.OrderUser', compact('groupedOrders'));
    }
}
