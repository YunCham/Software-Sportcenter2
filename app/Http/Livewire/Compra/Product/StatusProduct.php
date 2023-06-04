<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;

class StatusProduct extends Component
{
    public $product, $status;

    public function mount(){
        $this->status = $this->product->status;
    }

    public function save(){
        $this->product->status = $this->status;
        $this->product->save();
        $this->emit('saved');
    }
    
    public function render()
    {
        return view('livewire.compra.product.status-product');
    }
}
