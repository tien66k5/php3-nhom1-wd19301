<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
         $products = Product::all();
         $newProducts = Product::where('is_featured', 1)->get();
         $hotProducts = Product::where('is_featured', 2)->get();
        return view('livewire.client.home', compact('products','newProducts', 'hotProducts'));
    }

}
