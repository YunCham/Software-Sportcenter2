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
use Illuminate\Database\Eloquent\Builder;

class CreateProductComponent extends Component
{
    public $name;
    public $slug;
    public $quantity;
    public $price;
    public $category;
    public $subcategory;
    public $brand;
    public $colors;
    public $sizes;

    public function mount()
    {
        // Inicializar la variable $subcategories con los datos necesarios
        $this->subcategory = Subcategory::all();
        $this->colors = Color::all();
        $this->sizes = Size::all();
        $this->brand = Brand::all();
    }

    public function saveProduct()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:categories,id',
            'brand' => 'required|exists:brands,id',
            'colors' => 'required|array',
            'sizes' => 'required|array',
        ]);
        // Crear el producto
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->quantity = $validatedData['quantity'];
        $product->price = $validatedData['price'];
        $product->save();
        // Asociar la categoría, subcategoría y marca al producto
        $product->categories()->attach($validatedData['category']);
        $product->subcategories()->attach($validatedData['subcategory']);
        $product->brands()->attach($validatedData['brand']);
        // Asociar los colores al producto
        $product->colors()->sync($validatedData['colors']);
        // Asociar los tamaños al producto
        $product->sizes()->sync($validatedData['sizes']);
        // Crear los detail_products
        foreach ($validatedData['colors'] as $colorId) {
            foreach ($validatedData['sizes'] as $sizeId) {
                $detailProduct = new DetailProduct();
                $detailProduct->product_id = $product->id;
                $detailProduct->color_id = $colorId;
                $detailProduct->size_id = $sizeId;
                $detailProduct->quantity = 0; // Establece la cantidad inicial según tus requerimientos
                $detailProduct->price = $validatedData['price']; // Establece el precio según tus requerimientos
                $detailProduct->save();
            }
        }
        // Restablecer los campos
        $this->reset();      
    }

    public function loadSubcategories()
    {
        $this->subcategory = Subcategory::where('category_id', $this->category)->get();
    }

    public function render()
    {
        $categories = Category::all();
        $subcategory = Subcategory::where('category_id')->get();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('livewire.compra.product.create-product-component', [
            'categories' => $categories,
            'subcategories' => $subcategory,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
