<?php

namespace App\Http\Livewire\Compra\Category\SubCategory;

use App\Models\Subcategory;
use Livewire\Component;

class SubCategoryComponent extends Component
{
    public function render()
    {
        $subcategory = Subcategory::orderBy('name', 'ASC')->paginate(15);
        return view('livewire.compra.category.sub-category.sub-category-component', ['subcategories' => $subcategory]);
    }
}
