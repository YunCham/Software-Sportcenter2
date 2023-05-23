<?php

namespace App\Http\Livewire\Compra\Size;

use App\Models\Size;
use Livewire\Component;

class SizeComponent extends Component
{
    public function deleteMarca($id)
    {
      $size = Size::find($id);
      $size->delete();
      session()->flash('message','Registro elimidado exitosamente!');
      return redirect()->route('size.index');
    }

    public function render()
    {
        $size = Size::orderBy('name', 'ASC')->paginate(16);
        return view('livewire.compra.size.size-component', ['sizes' => $size]);
    }
}
