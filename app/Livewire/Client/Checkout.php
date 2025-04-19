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
    public $provinces = [];
    public $districts = [];
    public $wards = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedWard = null;
    public $user;
    public $dataCart;
    public $address;

    public function mount()
    {
        $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/p/');

        if ($response->successful()) {
            $this->provinces = $response->json();
        } else {
            $this->provinces = [];
        }

        $this->dataCart  = cardModel::where('user_id', Auth::id())->get();
        $this->user  = User::where('id', Auth::id())->first();
    }

    public  function checkout()
    {
        $userId = Auth::id();

        $cartItems = cardModel::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            session()->flash('error', 'Giỏ hàng đang trống.');
            return;
        }

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->productSku->price;
        });

        $order = Order::create([
            'user_id' => $userId,
            'address_id' => $this->address,
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

    public function updatedSelectedProvince($provinceId)
    {
        if (!$provinceId) {
            $this->districts = [];
            $this->wards = [];
            $this->selectedDistrict = null;
            $this->selectedWard = null;
            return;
        }

        $response = Http::withoutVerifying()->get("https://provinces.open-api.vn/api/p/{$provinceId}?depth=2");

        if ($response->successful()) {
            $data = $response->json();
            $this->districts = $data['districts'] ?? [];
        } else {
            $this->districts = [];
        }

        $this->wards = [];
        $this->selectedDistrict = null;
        $this->selectedWard = null;
    }

    public function updatedSelectedDistrict($districtId)
    {
        if (!$districtId) {
            $this->wards = [];
            $this->selectedWard = null;
            return;
        }

        $response = Http::withoutVerifying()->get("https://provinces.open-api.vn/api/d/{$districtId}?depth=2");

        if ($response->successful()) {
            $data = $response->json();
            $this->wards = $data['wards'] ?? [];
        } else {
            $this->wards = [];
        }

        $this->selectedWard = null;
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('livewire.client.checkout', ['user' => $this->user, 'dataCart' => $this->dataCart]);
    }
}
