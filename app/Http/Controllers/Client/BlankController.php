<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlankController extends Controller
{
    public function index(){
        $data = 'hi';
        return view('client.blank' , compact('data'));
    }
}
