<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ShowProducts extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.compra.product.show-products', compact('products'));
    }
}
