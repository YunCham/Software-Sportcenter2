<?php

namespace App\Http\Livewire\Compra\Category\SubCategory;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class EditSubCategoryComponent extends Component
{
    public $subcategory;
    public $name;
    public $slug;
    public $category_id;
    public $categories;

    public function mount($category_id)
    {
        $this->subcategory = Subcategory::findOrFail($category_id);
        $this->name = $this->subcategory->name;
        $this->slug = $this->subcategory->slug;
        $this->category_id = $this->subcategory->category_id;
        $this->categories = Category::all();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:subcategories,slug,' . $this->subcategory->id,
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'slug.required' => 'El slug es requerido.',
            'slug.unique' => 'El slug ya está en uso.',
            'category_id.required' => 'El ID de categoría es requerido.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
        ];
    }

    public function goBack()
    {
        return redirect()->route('subcategory.index');
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        $this->subcategory->name = $validatedData['name'];
        $this->subcategory->slug = $validatedData['slug'];
        $this->subcategory->category_id = $validatedData['category_id'];
        $this->subcategory->save();
        session()->flash('message', 'Subcategoría actualizada exitosamente!');
        return redirect()->route('subcategory.index');
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.compra.category.sub-category.create-sub-category-component');
    }
}
