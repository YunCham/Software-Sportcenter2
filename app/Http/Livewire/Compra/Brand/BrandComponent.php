<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;

class BrandComponent extends Component
{
    public function deleteMarca($id)
    {
      $brand = Brand::find($id);
      $brand->delete();
      session()->flash('message','Registro elimidado exitosamente!');
      return redirect()->route('marca.index');
    }
    public function render()
    {
        $brand = Brand::orderBy('name', 'ASC')->paginate(15);
        return view('livewire.compra.brand.brand-component', ['brands' => $brand]);
    }
}
