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
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;


class ProductDetail extends Component
{
    public $id;
    public $price;
    public $rating;
    public $content;
    public $product;
    public $sku;
    public $skuName;
    public $selectedSkuId;
    public $images;
    public $sku_id;
    public $quantity = 1;
    public $relatedProducts;
    public function mount($id)
    {
        $this->id = $id;
        $this->product = Product::findOrFail($this->id);
        $this->sku = ProductSku::where('product_id', $id)->get();
        $this->product = Product::with('ratings')->find($id);
        $this->images = $this->product->images;
        $this->price = $this->sku->first()->price;
        $this->skuName = $this->sku->first()->sku;

        $this->product = Product::with('ratings')->findOrFail($id);
        $categoryIds = $this->product->categoryValues->pluck('id'); 

        $this->relatedProducts = Product::whereHas('categoryValues', function ($query) use ($categoryIds) {
            $query->whereIn('category_Values.id', $categoryIds);
        })
            ->where('id', '!=', $id) 
            ->limit(4) 
            ->get();
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
        return view('livewire.client.detail', ['data' => $this->product, 'sku' => $this->sku, 'image' => $this->images, 'price' => $this->price, 'skuName' => $this->skuName, 'ratings' => $this->product->ratings()->where('status', 1)->get(),]);
    }

    public function store()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đánh giá.');
        }

        try {
            $userId = Auth::id();
            $productId = $this->product->id;
            $skuId = optional($this->product->defaultSku)->id;

 
            $order = Order::where('user_id', $userId)
                ->where('status', 1)
                ->whereHas('details', function ($query) use ($skuId) {
                    $query->where('order_details.sku_id', $skuId);
                })
                ->first();

            if (!$order) {
                session()->flash('error', 'Bạn cần mua sản phẩm và có đơn hàng đã giao để có thể đánh giá.');
                return redirect()->back();
            }


            /*
            $hasRated = Rating::where('user_id', $userId)
                ->where('product_id', $productId)
                ->exists();
    
            if ($hasRated) {
                session()->flash('error', 'Bạn đã đánh giá sản phẩm này rồi.');
                return;
            }
            */


            $rating = Rating::create([
                'rating' => $this->rating,
                'user_id' => $userId,
                'product_id' => $productId,
                'preview' => $this->content,
                'status' => 1,
            ]);


            if (!empty($this->content)) {
                Comment::create([
                    'content' => $this->content,
                    'rating_id' => $rating->id,
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'status' => 1,
                ]);
            }

            session()->flash('success', 'Đánh giá của bạn đã được gửi thành công!');
            $this->reset(['rating', 'content']);
        } catch (\Exception $e) {
            Log::error('Lỗi khi lưu đánh giá: ' . $e->getMessage());
            session()->flash('error', 'Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại sau.');
        }
    }
}
