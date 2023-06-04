<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;

class BrandComponent extends Component
{
    
  public $brands, $brand, $modalBrandId;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    public $rules = [
        'createForm.name' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];

    public function mount(){
        $this->getBrands();
    }

    public function getBrands()
    {
        $this->brands = Brand::orderBy('name', 'asc')->take(18)->get();
    }

    public function save(){
        $this->validate();
        Brand::create($this->createForm);
        $this->reset('createForm');
        $this->getBrands();
    }

    public function edit($brandId)
    {
        $this->brand = Brand::find($brandId);
        $this->editForm['open'] = true;
        $this->editForm['name'] = $this->brand->name;
        $this->editForm['brandId'] = $brandId;
    }
    
    public function goBack()
    {
        $this->redirect(route('marca.index'));
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);
        if ($this->brand) {
            $this->brand->update([
                'name' => $this->editForm['name']
            ]);
    
            $this->reset('editForm');
            $this->getBrands();
        }
    }

    public function delete($brandId)
    {
        $brand = Brand::find($brandId);
        $brand->delete();
        session()->flash('message','Registro elimidado exitosamente!');
        return redirect()->route('marca.index');
    }

    public function render()
    {
        return view('livewire.compra.brand.brand-component');
    }
}
