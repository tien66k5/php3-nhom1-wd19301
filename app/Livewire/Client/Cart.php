<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as cardModel;

class Cart extends Component
{
    public $data;
    public function mount()
    {
        $this->data  = cardModel::where('user_id', Auth::id())->get();
    }

    public function render()
    {

        return view('livewire.client.cart', ['data' => $this->data]);
    }

    public function delete()
    {
        cardModel::where('user_id',  Auth::id())->get()->delete();
    }

    public  function deleteOne($skuId)
    {
        cardModel::where('id', $skuId)
            ->where('user_id', Auth::id())
            ->delete();
    }
}
