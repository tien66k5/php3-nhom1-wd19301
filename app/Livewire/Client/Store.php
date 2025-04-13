<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\CategoryValue;
use App\Models\Brand;
use App\Models\Category;

class Store extends Component
{
    use WithPagination;

    public $selectedCategories = [];
    public $selectedCategoryValueIds = [];
    public $selectedBrandIds = [];
    public $sortOrder = 'desc'; 
    public $perPage = 9;  
    
    public $minPrice ;
    public $maxPrice ;

    protected $casts = [
        'selectedBrandIds' => 'array',
        'selectedCategoryValueIds' => 'array',
    ];

    protected $updatesQueryString = [
        'selectedBrandIds',
        'selectedCategoryValueIds',
        'minPrice',
        'maxPrice',
    ];

    public function testClick()
    {
        logger('Click hoạt động!');
    }

    public function updated($name, $value)
    {
        logger("Updated {$name} with value: ", [$value]);
        $this->resetPage();
    }

    public function render()
    {
        logger('Selected Categories: ', $this->selectedCategoryValueIds);
        logger('Selected Brands: ', $this->selectedBrandIds);
        logger('Price Range: ', [$this->minPrice, $this->maxPrice]);
    
        $query = Product::query()->with(['defaultSku', 'category', 'brand']);
    
 
        if (!empty($this->selectedCategoryValueIds)) {
            $query->whereHas('categoryValues', function ($q) {
                $q->whereIn('category_values.id', $this->selectedCategoryValueIds);
            });
        }
    
 
        if (!empty($this->selectedBrandIds)) {
            $query->whereIn('brand_id', $this->selectedBrandIds);
        }
     
        if ($this->minPrice !== null || $this->maxPrice !== null) {
            $query->whereHas('productSkus', function ($q) {
                if ($this->minPrice !== null) {
                    $q->where('price', '>=', $this->minPrice);
                }
                if ($this->maxPrice !== null) {
                    $q->where('price', '<=', $this->maxPrice);
                }
            });
        }
    
 
        if ($this->sortOrder === 'desc') {
            $query->orderBy('created_at', 'desc');   
        } else {
            $query->orderBy('created_at', 'asc');  
        }
    
 
        $products = $query->paginate($this->perPage);
    
        return view('livewire.client.store', [
            'products' => $products,
            'brands' => Brand::all(),
            'categories' => Category::with('categoryValues')->get(),
        ]);
    }
    
}
