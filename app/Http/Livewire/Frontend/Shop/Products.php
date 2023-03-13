<?php

namespace App\Http\Livewire\Frontend\Shop;

use Livewire\Component;
use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use Livewire\WithPagination;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category, $brandInput = [], $priceInput, $subCategory = [], $dateSelect;

    protected $queryString = [
        'brandInput' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
        'dateSelect' => ['except' => '', 'as' => 'date'],
    ];

    public function render()
    {
        $brands = Brand::where('status', '1')->get();
        if ($this->category->parent_id == '0') {
            if ($this->subCategory) {
                $this->products = Product::whereIn('category_id', $this->subCategory)
                ->when($this->dateSelect, function($q) {
                    $q->when($this->dateSelect == 'latest', function ($q2) {
                        $q2->orderBy('id', 'DESC');
                    })
                        ->when($this->dateSelect == 'older', function ($q2) {
                        $q2->orderBy('id', 'ASC');
                    });
                })
                ->when($this->brandInput, function($q) {
                    $q->whereIn('brand', $this->brandInput);
                })
                ->when($this->priceInput, function($q) {
                    $q->when($this->priceInput == 'high-to-low', function ($q2) {
                        $q2->orderBy('selling_price', 'DESC');
                    })
                        ->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
                })
                ->get();
            } else {
                $this->products = $this->category->products()
                ->when($this->dateSelect, function($q) {
                    $q->when($this->dateSelect == 'latest', function ($q2) {
                        $q2->orderBy('id', 'DESC');
                    })
                        ->when($this->dateSelect == 'older', function ($q2) {
                        $q2->orderBy('id', 'ASC');
                    });
                })
                ->when($this->brandInput, function($q) {
                    $q->whereIn('brand', $this->brandInput);
                })
                ->when($this->priceInput, function($q) {
                    $q->when($this->priceInput == 'high-to-low', function ($q2) {
                        $q2->orderBy('selling_price', 'DESC');
                    })
                        ->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
                })
                ->get();
            }
        } else {
            $this->products = $this->category->categoryProducts()
                ->when($this->dateSelect, function($q) {
                    $q->when($this->dateSelect == 'latest', function ($q2) {
                        $q2->orderBy('id', 'DESC');
                    })
                        ->when($this->dateSelect == 'older', function ($q2) {
                        $q2->orderBy('id', 'ASC');
                    });
                })
                ->when($this->brandInput, function($q) {
                    $q->whereIn('brand', $this->brandInput);
                })
                ->when($this->priceInput, function($q) {
                    $q->when($this->priceInput == 'high-to-low', function ($q2) {
                        $q2->orderBy('selling_price', 'DESC');
                    })
                        ->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
                })
                ->get();
        }

        $colors = Color::all();
        return view('livewire.frontend.shop.products', [
            'brands' => $brands,
            'products' => $this->products,
            'colors' => $colors,
        ]);
    }
}
