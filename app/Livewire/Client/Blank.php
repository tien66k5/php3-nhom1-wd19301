<?php
namespace App\Livewire\Client;

use Livewire\Component;

class Blank extends Component
{
    public function render(){
        $data = 'hi';
        return view('livewire.client.blank' , compact('data'));
    }
}
