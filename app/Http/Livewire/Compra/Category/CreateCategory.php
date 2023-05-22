<?php

namespace App\Http\Livewire\Compra\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;
    public $name;
    public $slug; 
    public $icon;
    public $image;

    public $createForm = [
        'name' => null,
        'slug' => null,
        'color' => false,
        'size' => false,
        'image' => false
    ];

    public function goBack()
    {
        return redirect()->route('categoria.index');
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

    public function storeBrand()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'icon' => 'required',
            'image' => 'required',
        ]);
        $category = new Category();
        $image = $this->image->store('categories', 'public');
        if($image){
            $category->image =  $image;
        }
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->icon = $validatedData['icon'];
        $category->save();
        session()->flash('message', 'Nueva Marca registrada!');
        return redirect()->route('categoria.index');
    }
    
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }
    
    public function render()
    {
        return view('livewire.compra.category.create-category');
    }
}
