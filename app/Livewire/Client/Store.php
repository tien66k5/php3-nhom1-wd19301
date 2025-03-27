<?php

namespace App\Livewire\Client;
use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        $data = 'hi';
        return view('livewire.client.store', compact('data'));
    }
}
