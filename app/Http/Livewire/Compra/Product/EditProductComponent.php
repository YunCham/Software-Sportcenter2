<?php

namespace App\Http\Livewire\Compra\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ColorSize;
use App\Models\DetailProduct;
use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class EditProductComponent extends Component
{
    public $subcategory_id, $category_id, $brand_id, $size_id, $color_id;
    public $categories, $subcategories, $brands, $sizes, $colors;
    public $detailProducts  = [], $detalleProductoIndex = 0, $tempProduc;
    public $price, $quantity, $name, $slug, $product_id;

    public function mount($detailproduct_id)
    {
        $product = Product::find($detailproduct_id);
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->subcategory_id = $product->subcategory_id;
        $this->category_id = $product->subcategory->category_id;      
        if ($product->subcategory_id) {
            $subcategory = Subcategory::find($product->subcategory_id);
            $this->subcategories = $subcategory ? $subcategory->category->subcategories : Subcategory::all();
        } else {
            $this->subcategories = Subcategory::all();
        } 
        $detaproducts = DetailProduct::all();
        foreach ($detaproducts as $detaproduct) {
            if ($detaproduct->product_id == $product->id) {
                $detailProducts = [
                    'brand_id' => $detaproduct->brand_id,
                    'size_id' => $detaproduct->size_id,
                    'quantity' => $detaproduct->quantity ? $detaproduct->quantity : 0,
                    'price' => $detaproduct->price ? $detaproduct->price : 0,
                    'color_id' => $detaproduct->color_id,
                    'status' => 1
                ]; 
                $this->detailProducts [] = $detailProducts;
                $this->detalleProductoIndex++;
            }
        }
        $this->categories = Category::all();
        $this->brands = Brand::all();
        $this->sizes = Size::all();
        $this->colors = Color::all();
    }

    public function addDetalleProducto()
    {     
        $this->detalleProductoIndex++;
        $detailProducts = [
            'brand_id' => $this->brand_id,
            'size_id' => $this->size_id,
            'quantity' => $this->quantity ? $this->quantity : 0,
            'price' => $this->price ? $this->price : 0,
            'color_id' => $this->color_id,
            'status' => 1
        ];      
        $this->detailProducts [] = $detailProducts;
        $this->brand_id = null;
        $this->size_id = null;
        $this->quantity = null;
        $this->price = null;
        $this->color_id = null;
    }

    public function submitForm()
    {
        $product = Product::find($this->product_id);
        if (empty($this->slug)) {
            return;
        }
        if (!$product) {
            return;
        }
        $product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'subcategory_id' => $this->subcategory_id,
        ]);

        $productTotalQuantity = 0;
        foreach ($this->detailProducts as $detailProduct) {
            if (!is_null($detailProduct['brand_id'])) { // Check if brand_id is not null
                if (isset($detailProduct['id'])) {
                    $existingDetailProduct = DetailProduct::find($detailProduct['id']);
                    if ($existingDetailProduct) {
                        $existingDetailProduct->update([
                            'brand_id' => $detailProduct['brand_id'],
                            'size_id' => $detailProduct['size_id'],
                            'color_id' => $detailProduct['color_id'],
                            'quantity' => $detailProduct['quantity'],
                            'price' => $detailProduct['price'],
                            'status' => 1,
                        ]);
                        $productTotalQuantity += $existingDetailProduct->quantity;
                    }
                } else {
                    $newDetailProduct = new DetailProduct([
                        'brand_id' => $detailProduct['brand_id'],
                        'size_id' => $detailProduct['size_id'],
                        'color_id' => $detailProduct['color_id'],
                        'product_id' => $this->product_id,
                        'quantity' => $detailProduct['quantity'],
                        'price' => $detailProduct['price'],
                        'status' => 1,
                    ]);
                    $newDetailProduct->save();
                    $productTotalQuantity += $newDetailProduct->quantity;
                }

                $colorProduct = ColorProduct::where('color_id', $detailProduct['color_id'])
                    ->where('product_id', $product->id)
                    ->first();
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

    public function render()
    {
        return view('livewire.compra.product.create-product-component');
    }
}
