<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Cart as cardModel;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{

    public $user;
    public $dataCart;
    public $address;
    public $fullAddress;
    public $form = [];

    public function mount()
    {

        $this->dataCart  = cardModel::where('user_id', Auth::id())->get();
        $this->user  = User::where('id', Auth::id())->first();
    }

    public function checkout()
    {
        $userId = Auth::id();
        $user = Auth::user();

        $cartItems = cardModel::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            session()->flash('error', 'Giỏ hàng đang trống.');
            return;
        }

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->productSku->price;
        });

        $selectedAddress = $user->checkoutAddresses->firstWhere('id', $this->address);

        $this->fullAddress = trim("{$selectedAddress?->address}, {$selectedAddress?->ward_name}, {$selectedAddress?->district_name}, {$selectedAddress?->province_name}", ', ');

        $order = Order::create([
            'user_id' => $userId,
            'addressName' => $this->fullAddress,
            'status' => 1,
            'total_price' => $totalPrice,
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'sku_id' => $item->sku_id,
                'price' => $item->productSku->price,
                'quantity' => $item->quantity,
            ]);
        }

        cardModel::where('user_id', $userId)->delete();

        session()->flash('success', 'Đặt hàng thành công!');
        return redirect()->route('home.index');
    }





    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $selectedAddress = $user->checkoutAddresses->firstWhere('id', $this->address); // $this->address là ID được chọn từ form

        $fullAddress = implode(', ', array_filter([
            $selectedAddress?->address,
            $selectedAddress?->ward_name,
            $selectedAddress?->district_name,
            $selectedAddress?->province_name,
            $selectedAddress?->phone,

        ]));



        $this->form = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];

        return view('livewire.client.checkout', [
            'user'     => $user,
            'dataCart' => $this->dataCart,
            'address' => $fullAddress
        ]);
    }
}
