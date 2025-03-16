<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
class HomeController extends Controller
{
    public function index()
    {
        $data = 'Chào mừng đến trang chủ!';
        return view('client.home', compact('data'));
    }

}
