<?php

namespace App\Http\Livewire\Compra\Category;

use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $category;
    public $subcategories;
    public $name;
    public $slug;
    public $icon;

    public $createForm = [
        'name' => null,
        'slug' => null,
        'color' => false,
        'size' => false
    ];

    public function mount()
    {
        $this->category = new Category();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'slug' => 'required|unique:subcategories,slug',
        ]);
    }

    public function goBack()
    {
        return redirect()->route('categoria.index');
    }

    public function getSubcategories()
    {
        $this->subcategories = Subcategory::where('category_id', $this->category->id)->get();
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.alpha' => 'El nombre solo puede contener letras y espacios.',
            'slug.required' => 'El slug es requerido.',
            'slug.unique' => 'El slug ya está en uso.',
            'icon.required' => 'El icono es requerido.',
        ];
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function storeBrand()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:subcategories,slug',
            'icon' => 'required',
        ]);
        
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->icon = $this->icon ?? ''; // Asignar una cadena vacía si el campo es nulo
        $category->save();
        $this->category->subcategories()->create($this->createForm);
        $this->reset('createForm');
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
