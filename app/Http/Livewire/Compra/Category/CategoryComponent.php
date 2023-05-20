<?php

namespace App\Http\Livewire\Compra\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function deleteCategoria($id)
    {
      $category = Category::find($id);
      $category->delete();
      session()->flash('message','Registro elimidado exitosamente!');
      return redirect()->route('marca.index');
    }

    public function render()
    {
        $category = Category::orderBy('name', 'ASC')->paginate(15);
        return view('livewire.compra.category.category-component', ['categories' => $category]);
    }
}
