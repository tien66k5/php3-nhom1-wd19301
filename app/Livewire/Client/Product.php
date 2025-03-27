<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Product extends Component
{
    public function render(){
        $data = 'Chào mừng đến trang chủ!';

        return view('livewire.client.product' , compact('data') );
    }

}
