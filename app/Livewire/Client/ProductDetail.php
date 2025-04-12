<?php

// namespace App\Livewire\Client;

// use App\Models\Category;
// use App\Models\Product as ModelsProduct;
// use Livewire\Component;

// class Product extends Component
// {
//     public function render(){

//        // $products = ModelsProduct::orderBy('created_at', 'desc')->get();
//        // dd($products);
//         return view('livewire.client.product');
//     }
//     public function productDetail($id){
//         $product =ModelsProduct::findOrFail($id);
//         return view('livewire.client.detail', compact('product'));  
//     }


// public function category() {
//     $categories = Category::all();
//     return view('livewire.client.layouts.header', compact('categories'));
// }


// }


namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Support\Facades\Log;


class ProductDetail extends Component
{
    public $id;
    public $price;

    public $product;

    public function mount($id)
    {
        $this->id = $id;
        $this->product = Product::find($this->id);
    }

    public function render()
    {
        return view('livewire.client.detail', ['data' => $this->product]);
    }
}
