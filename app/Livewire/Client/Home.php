<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $data = 'Chào mừng đến trang chủ!';
        return view('livewire.client.home', compact('data'));
    }

}
