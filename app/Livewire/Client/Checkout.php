<?php

namespace App\Livewire\Client;

use Livewire\Component;


class Checkout extends Component
{
    public function render()
    {
        $data = 'Chào mừng đến trang chủ!';
        return view('livewire.client.checkout', compact('data'));
    }
    public function cart(){
        $data = 'Chào mừng đến trang chủ!';

        return view('livewire.client.cart', compact('data'));
    }
}
