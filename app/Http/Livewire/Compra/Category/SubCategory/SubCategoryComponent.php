<?php

namespace App\Http\Livewire\Compra\Category\SubCategory;

use App\Models\Subcategory;
use Livewire\Component;

class SubCategoryComponent extends Component
{
    public function deleteCategoria($id)
    {
        $category = Subcategory::find($id);
        $category->delete();
        session()->flash('message', 'Registro eliminado exitosamente!');
        return redirect()->route('subcategory.index');
    }
    
    public function render()
    {
        $subcategory = Subcategory::orderBy('name', 'ASC')->paginate(15);
        return view('livewire.compra.category.sub-category.sub-category-component', ['subcategories' => $subcategory]);
    }
}
