<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = 'Chào mừng đến trang chủ!';

        return view('client.product' , compact('data') );
    }

}
