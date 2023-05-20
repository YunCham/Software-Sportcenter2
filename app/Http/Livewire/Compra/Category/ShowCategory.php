<?php

namespace App\Http\Livewire\Compra\Category;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ShowCategory extends Component
{
    public function render()
    {
        return view('livewire.compra.category.show-category');
    }
}
