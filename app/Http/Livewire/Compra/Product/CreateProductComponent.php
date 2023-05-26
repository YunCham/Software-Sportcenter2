<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CreateProductComponent extends Component
{
    public $category_id, $subcategory_id, $brand_id, $product_id, $size_id, $color_id;
    public $categories = [], $subcategories = [], $brands = [];
    public $name, $quantity, $price, $slug, $sizes, $colors;
    public $detailProducts  = []; // Lista de detalles de productos temporales

    public function mount()
    {
        $this->categories = Category::all();
        $this->subcategories = Subcategory::all();
        $this->brands = Brand::all();
        $this->sizes = Size::all();
        $this->colors = Color::all();
        $this->loadDetailProducts();
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

    public function addDetalleProducto()
    {
        $detalleProducto = [
            'brand_id' => $this->brand_id,
            'size_id' => $this->size_id,
            'quantity' => $this->quantity ? $this->quantity : 0,
            'price' => $this->price ? $this->price : 0,
            'status' => 1
        ];
        $this->detailProducts [] = $detalleProducto;
        // Limpiar los campos después de agregar un detalle de producto
        $this->brand_id = null;
        $this->size_id = null;
        $this->quantity = null;
        $this->price = null;
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
        if (!is_null($detailProduct['brand_id'])) { // Check if brand_id is not null
            $newDetailProduct = new DetailProduct();
            $newDetailProduct->brand_id = $detailProduct['brand_id'];
            $newDetailProduct->size_id = $detailProduct['size_id'];
            $newDetailProduct->product_id = $product->id;
            $newDetailProduct->quantity = $detailProduct['quantity'];
            $newDetailProduct->price = $detailProduct['price'];
            $newDetailProduct->status = 1;
            $newDetailProduct->save();
        }
    }
    return redirect()->route('product.index');
}

    public function removeDetalleProducto($index)
    {
        unset($this->detailProducts[$index]);
        $this->detailProducts  = array_values($this->detailProducts);
    }

    public function render()
    {
        return view('livewire.compra.product.create-product-component');
    }
}
