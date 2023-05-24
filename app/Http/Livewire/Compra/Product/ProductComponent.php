<?php

namespace App\Http\Livewire\Compra\Product;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Size;

class ProductComponent extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $colors = Color::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        $sizes = Size::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.compra.product.product-component' , compact('products', 'colors', 'sizes'));
    }
}
