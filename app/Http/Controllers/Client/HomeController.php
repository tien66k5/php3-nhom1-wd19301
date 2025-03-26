<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)
            ->withMin('skus', 'price') 
            ->latest()
            ->limit(10)
            ->get();
        $productUp = Product::where('status', 1)
            ->withMin('skus', 'price') 
            ->latest()
            ->limit(9)
            ->get();

        return view('client.home', compact('products', 'productUp'));
    }
}
