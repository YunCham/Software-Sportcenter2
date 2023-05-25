<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CreateProductComponent extends Component
{
    public $category_id, $subcategory_id, $brand_id;
    public $categories = [], $subcategories = [], $brands = [];
    public $name, $quantity, $price, $slug;

    public function mount()
    {
        $this->categories = Category::all();
        $this->subcategories = Subcategory::all();
        $this->brands = Brand::all();
    }

    public function updateSubcategories()
    {
        if ($this->category_id) {
            $category = Category::find($this->category_id);
            $this->subcategories = $category ? $category->subcategories : Subcategory::all();
        } else {
            $this->subcategories = Subcategory::all();
        }
        $this->subcategory_id = null;
    }

    public function goBack()
    {
        $this->redirect(route('product.index'));
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.compra.product.create-product-component');
    }
}
