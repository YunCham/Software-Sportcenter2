<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products = [];

    public function loadPosts(){
        $this->products = $this->category->products()->where('status', 2)->take(15)->get();
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.compra.product.category-products');
    }
}
