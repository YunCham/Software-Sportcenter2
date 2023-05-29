<?php

namespace App\Http\Livewire\Compra\Product;

use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ColorSize;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;
    public $dato;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function deleteProductoOriginal($id) {
        $product = Product::find($id);
        if ($product) {
            $detailProducts = DetailProduct::where('product_id', $product->id)->get();
            foreach ($detailProducts as $detailProduct) {
                $quantity = $detailProduct->quantity;
                $colorProduct = ColorProduct::where('color_id', $detailProduct->color_id)
                    ->where('product_id', $product->id)->first();
                if ($colorProduct) {
                    $colorProduct->quantity -= $quantity;
                    $colorProduct->save();
                }
                $colorSize = ColorSize::where('color_id', $detailProduct->color_id)
                    ->where('size_id', $detailProduct->size_id)->first();
                if ($colorSize) {
                    $colorSize->quantity -= $quantity;
                    $colorSize->save();
                }
                $product->quantity -= $detailProduct->quantity;
                $product->save();
                $detailProduct->delete();
            }
            $product->delete();
        }
    }    

    public function deleteProducto($id)
    {
        $detailProduct = DetailProduct::find($id);
        if ($detailProduct) {
            $product = $detailProduct->product;
            $quantity = $detailProduct->quantity;
            $colorProduct = ColorProduct::where('color_id', $detailProduct->color_id)
                ->where('product_id', $product->id)->first();
            if ($colorProduct) {
                $colorProduct->quantity -= $quantity;
                $colorProduct->save();
            }
            $colorSize = ColorSize::where('color_id', $detailProduct->color_id)
                ->where('size_id', $detailProduct->size_id)->first();
            if ($colorSize) {
                $colorSize->quantity -= $quantity;
                $colorSize->save();
            }
            $product->quantity -= $detailProduct->quantity;
            $product->save();
            $detailProduct->delete();
        } 
    }
        
    public function render()
    {
        $detailproducts = DetailProduct::with('product', 'brand')->where('id', 'like', '%' . $this->search . '%')->paginate(25);
        $sizes = Size::where('id', 'like', '%' . $this->search . '%')->paginate(25);
        $colors = Color::where('id', 'like', '%' . $this->search . '%')->paginate(25);
        $products = Product::with('subcategory')->where('id', 'like', '%' . $this->search . '%')->paginate(25);
        return view('livewire.compra.product.product-component', compact('detailproducts', 'sizes', 'colors', 'products'));
    }
}
