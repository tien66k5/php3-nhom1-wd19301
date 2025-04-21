<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
{
    // $products = Product::with('ratings')->get();
    $products = Product::with(['ratings', 'productSku'])->get();
    $newProducts = Product::with('ratings')->where('is_featured', 1)->get();
    $hotProducts = Product::with('ratings')->where('is_featured', 2)->get();

    return view('livewire.client.home', compact('products', 'newProducts', 'hotProducts'));
}


}
