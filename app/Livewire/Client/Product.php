<?php

namespace App\Livewire\Client;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public function render(){
        
       // $products = ModelsProduct::orderBy('created_at', 'desc')->get();
       // dd($products);
        return view('livewire.client.product');
    }
    public function productDetail($id){
        $product =ModelsProduct::findOrFail($id);
        return view('livewire.client.detail', compact('product'));
    }

   
public function category() {
    $categories = Category::all();
    return view('livewire.client.layouts.header', compact('categories'));
}


}
