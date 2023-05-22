<?php

namespace App\Http\Livewire\Compra\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditCategoryComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $slug, $icon, $image,  $category_id, $imageOp;

    public function goBack()
    {
        return redirect()->route('categoria.index');
    }

    public function mount($category_id)
    {
        $categories = Category::find($category_id);
        $this->category_id = $categories->id;
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->icon = $categories->icon;
        $this->image = $categories->image;
    }
            
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id,
            'icon' => 'required',
            'image' => 'required',
        ]);        
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'slug.required' => 'El slug es requerido.',
            'slug.unique' => 'El slug ya está en uso.',
            'icon.required' => 'El icono es requerido.',
            'image.required' => 'La imagen es requerido.',
        ];
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function updateMarcas()
    {
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->icon = $this->icon;
        $imagePath = 'public/' . $category->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        if ($this->image) {
            $imageOp = $this->image->store('categories', 'public');
            $category->image = $imageOp;
        }
        $category->save();
        session()->flash('message', 'Editar Marca registrada!');
        return redirect()->route('categoria.index');
    }
    
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.compra.category.edit-category-component');
    }
}
