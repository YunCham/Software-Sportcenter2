<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;

class ShowBrandComponent extends Component
{
   
    public function render(Brand $brand)
    {
        return view('livewire.compra.brand.show-brand-component', compact('brand'));
    }

}
