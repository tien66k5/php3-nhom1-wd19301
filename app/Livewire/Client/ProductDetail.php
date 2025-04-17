<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;

use function PHPUnit\Framework\returnCallback;

class ProductDetail extends Component
{
    public $id;
    public $price;

    public $product;
    public $sku;
    public $skuName;
    public $selectedSkuId;
    public $images;
    public $sku_id;
    public $quantity = 1;
    public function mount($id)
    {
        $this->id = $id;
        $this->product = Product::findOrFail($this->id);
        $this->sku = ProductSku::where('product_id', $id)->get();
        $this->images = $this->product->images;
        $this->price = $this->sku->first()->price;
        $this->skuName = $this->sku->first()->sku;
    }

    public function updateSku($sku)
    {
        $productSku = ProductSku::find($sku);
        if ($productSku) {
            $this->price = $productSku->price;
            $this->skuName = $productSku->sku;
        } else {
            $this->price = 0;
        }
        $this->dispatch('updatedPrice');
    }
    public function increaseQuantity()
    {
        $this->quantity++;
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    public function addToCart()
    {
        if (!$this->sku_id || !$this->quantity || $this->quantity < 1) {
            session()->flash('error', 'Vui lòng chọn phiên bản và số lượng hợp lệ.');
            return;
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id();
        $existedCart = CartModel::where('user_id', $userId)
            ->where('sku_id', $this->sku_id)
            ->first();

        if ($existedCart) {
            $existedCart->quantity += $this->quantity;
            $existedCart->save();
        } else {
            CartModel::create([
                'user_id' => $userId,
                'sku_id' => $this->sku_id,
                'quantity' => $this->quantity,
            ]);
        }

        session()->flash('success', 'Đã thêm vào giỏ hàng!');
        //     dd([     'user_id' => $userId,
        //     'sku_id' => $this->sku_id,
        //     'quantity' => $this->quantity,
        // ]);
        return redirect()->route('cart.index');
    }
    public function render()
    {
        return view('livewire.client.detail', ['data' => $this->product, 'sku' => $this->sku, 'image' => $this->images, 'price' => $this->price, 'skuName' => $this->skuName]);
    }
}
