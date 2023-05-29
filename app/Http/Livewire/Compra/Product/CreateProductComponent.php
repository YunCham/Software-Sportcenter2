<?php

namespace App\Http\Livewire\Compra\Product;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ColorSize;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CreateProductComponent extends Component
{
    public $category_id, $subcategory_id, $brand_id, $product_id, $size_id, $color_id;
    public $categories = [], $subcategories = [], $brands = [];
    public $name, $quantity, $price, $slug, $sizes, $colors, $tempProduct;
    public $detailProducts  = [], $detalleProductoIndex = 0;

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

    public function addDetalleProducto()
    {     
        $this->detalleProductoIndex++;
        $detalleProducto = [
            'brand_id' => $this->brand_id,
            'size_id' => $this->size_id,
            'quantity' => $this->quantity ? $this->quantity : 0,
            'price' => $this->price ? $this->price : 0,
            'color_id' => $this->color_id,
            'status' => 1
        ];      
        $this->detailProducts [] = $detalleProducto;
        $this->brand_id = null;
        $this->size_id = null;
        $this->quantity = null;
        $this->price = null;
        $this->color_id = null;
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
        $product->save();
        $productId = $product->id;
        $productTotalQuantity = 0;
        foreach ($this->detailProducts as $detailProduct) {
            if (!is_null($detailProduct['brand_id'])) { // Check if brand_id is not null
                $newDetailProduct = new DetailProduct([
                    'brand_id' => $detailProduct['brand_id'],
                    'size_id' => $detailProduct['size_id'],
                    'color_id' => $detailProduct['color_id'],
                    'product_id' => $productId,
                    'quantity' => $detailProduct['quantity'],
                    'price' => $detailProduct['price'],
                    'status' => 1,
                ]);
                $newDetailProduct->save();
                $productTotalQuantity += $newDetailProduct->quantity;                        
                $colorProduct = ColorProduct::where('color_id', $detailProduct['color_id'])
                ->where('product_id', $product->id)->first();
                if ($colorProduct) {
                    $colorProduct->quantity += $detailProduct['quantity'];
                    $colorProduct->save();
                } else {
                    $colorProduct = new ColorProduct();
                    $colorProduct->color_id = $detailProduct['color_id'];
                    $colorProduct->product_id = $product->id;
                    $colorProduct->quantity = $detailProduct['quantity'];
                    $colorProduct->save();
                }
                $colorSize = ColorSize::where('color_id', $detailProduct['color_id'])
                    ->where('size_id', $detailProduct['size_id'])
                    ->first();
                if ($colorSize) {
                    $colorSize->quantity += $detailProduct['quantity'];
                    $colorSize->save();
                } else {
                    $colorSize = new ColorSize();
                    $colorSize->color_id = $detailProduct['color_id'];
                    $colorSize->size_id = $detailProduct['size_id'];
                    $colorSize->quantity = $detailProduct['quantity'];
                    $colorSize->save();
                }
            }
        }
        $product = Product::find($productId);
        $product->quantity = $productTotalQuantity;
        $product->save();
        $this->redirect(route('product.index'));
    }
    
    public function removeDetalleProducto($index)
    {
        unset($this->detailProducts[$index]);
        $this->detailProducts = array_values($this->detailProducts);
        $this->detalleProductoIndex--;
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
    
    public function render()
    {
        return view('livewire.compra.product.create-product-component');
    }
}
