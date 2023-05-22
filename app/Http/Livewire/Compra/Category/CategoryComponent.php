<?php

namespace App\Http\Livewire\Compra\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class CategoryComponent extends Component
{
    public function deleteCategoria($id)
    {
        $category = Category::find($id);
        $imagePath = 'public/' . $category->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $category->delete();
        session()->flash('message', 'Registro eliminado exitosamente!');
        return redirect()->route('categoria.index');
    }

    public function render()
    {
        $category = Category::orderBy('name', 'ASC')->paginate(15);
        return view('livewire.compra.category.category-component', ['categories' => $category]);
    }
}
