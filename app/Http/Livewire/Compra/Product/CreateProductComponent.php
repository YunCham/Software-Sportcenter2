<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CreateProductComponent extends Component
{
    public $category_id, $subcategory_id, $brand_id;
    public $categories = [], $subcategories = [], $brands = [];
    public $name, $quantity, $price, $slug, $size_id, $sizes, $colors;
    public $detailProducts = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->subcategories = Subcategory::all();
        $this->brands = Brand::all();
        $this->sizes = Size::all();
        $this->colors = Color::all();
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
    public function loadDetailProducts()
{
    // Inicializa la variable $detailProducts como un arreglo vacío
    $detailProducts = [];

    // Puedes agregar cualquier otra lógica que necesites aquí.

    // Asigna los detalles de los productos a la propiedad del componente
    $this->detailProducts = $detailProducts;

    // Puedes agregar cualquier otra lógica que necesites aquí.

    // Notifica a Livewire que se ha actualizado la propiedad $detailProducts para que se refresque la vista.
    $this->emit('detailProductsLoaded');
}


    public function addDetailProduct()
    {
        $rules = [
            'brand_id' => 'required|exists:brands,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ];
        foreach ($this->detailProducts as $index => $detailProduct) {
            $rules["detailProducts.{$index}.brand_id"] = 'different:brand_id';
            $rules["detailProducts.{$index}.size_id"] = 'different:size_id';
        }
        $validatedData = $this->validate($rules);
        $detailProduct = [
            'brand_id' => $validatedData['brand_id'],
            'size_id' => $validatedData['size_id'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
        ];
        $this->detailProducts[] = $detailProduct;
        $this->reset(['brand_id', 'size_id', 'quantity', 'price']);
    }

    public function submitForm()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'slug' => 'required|unique:products,slug',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->subcategory_id = $validatedData['subcategory_id'];
        $product->price = $this->price ? $this->price : 0;
        $product->quantity = $this->quantity ? $this->quantity : 0;
        $product->save();
        foreach ($this->detailProducts as $detailProduct) {
            $product->detailProducts()->create($detailProduct);
        }
        return redirect()->route('product.index');
    }

    public function removeDetailProduct($index)
    {
        unset($this->detailProducts[$index]);
        $this->detailProducts = array_values($this->detailProducts);
    }

    public function render()
    {
        return view('livewire.compra.product.create-product-component');
    }
}
