<?php

namespace App\Livewire\Client;

use App\Models\CategoryValue;
use App\Models\Brand;
use App\Models\ProductSku;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Config extends Component
{
    public $modalOpen = false;
    public $selectedComponent;
    public $components = [];
    public $selectedSkus = [];
    public $availableBrands = [];
    public $selectedBrands = [];
    public $selectedPrices = [];
    public $priceRanges = [
        'Dưới 1 triệu' => [0, 1000000],
        '1 triệu - 2 triệu' => [1000000, 2000000],
        '2 triệu - 5 triệu' => [2000000, 5000000],
        '5 triệu - 7 triệu' => [5000000, 7000000],
        '7 triệu - 10 triệu' => [7000000, 10000000],
        '10 triệu - 15 triệu' => [10000000, 15000000],
    ];

    public $search = '';
    public $sortBy = '';

    public function mount()
    {

        $this->components = CategoryValue::with('category')->get()->keyBy('name');
        $this->availableBrands = Brand::All();
    }

    public function openModal($componentKey)
    {
        $this->selectedComponent = $componentKey;
        $this->modalOpen = true;
    }


    public function closeModal()
    {
        $this->modalOpen = false;
        $this->selectedComponent = null;
    }

    public function addToBuild($skuId)
    {
        $sku = ProductSku::with('product')->find($skuId);

        if ($sku && $this->selectedComponent) {
            $this->selectedSkus[$this->selectedComponent] = [
                'id' => $sku->id,
                'name' => $sku->product->name ?? 'Không rõ tên',
                'price' => $sku->price,
                'thumbnail' => $sku->thumbnail
            ];

            $this->closeModal();
        }
    }

    public function addBuildToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $userId = Auth::id();
    
        foreach ($this->selectedSkus as $component => $sku) {
            if (!isset($sku['id'])) continue;
    
            $existing = \App\Models\Cart::where('user_id', $userId)
                ->where('sku_id', $sku['id'])
                ->first();
    
            if ($existing) {
                $existing->quantity += 1;
                $existing->save();
            } else {
                \App\Models\Cart::create([
                    'user_id' => $userId,
                    'sku_id' => $sku['id'],
                    'quantity' => 1,
                ]);
            }
        }
    
        session()->flash('success', 'Cấu hình đã được thêm vào giỏ hàng!');
        return redirect()->route('cart.index');
    }
    

    public function getFilteredSkusProperty()
    {
        $query = ProductSku::query()->with('product');

        if ($this->search) {
            $query->whereHas('product', function($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }
        
        if ($this->selectedComponent) {
            $query->whereHas('product.categoryValues', function ($q) {
                $q->where('name', $this->selectedComponent);
            });
        }

        if (!empty($this->selectedBrands)) {
            $query->whereHas('product', function ($q) {
                $q->whereIn('brand_id', $this->selectedBrands);
            });
            
        }

        if (!empty($this->selectedPrices)) {
            $query->where(function ($q) {
                foreach ($this->selectedPrices as $label) {
                    [$min, $max] = $this->priceRanges[$label];
                    $q->orWhereBetween('price', [$min, $max]);
                }
            });
        }

        if ($this->sortBy === 'price_asc') {
            $query->orderBy('price');
        } elseif ($this->sortBy === 'price_desc') {
            $query->orderByDesc('price');
        } elseif ($this->sortBy === 'name_asc') {
            $query->orderBy('name');
        } elseif ($this->sortBy === 'name_desc') {
            $query->orderByDesc('name');
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.client.config', [
            'filteredSkus' => $this->filteredSkus,
            'components' => $this->components,
            'selectedSkus' => $this->selectedSkus
        ]);
    }
}
