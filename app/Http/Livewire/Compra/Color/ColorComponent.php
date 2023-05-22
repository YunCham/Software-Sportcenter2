<?php

namespace App\Http\Livewire\Compra\Color;

use App\Models\Color;
use Livewire\Component;

class ColorComponent extends Component
{
    public function deleteMarca($id)
    {
      $color = Color::find($id);
      $color->delete();
      session()->flash('message','Registro elimidado exitosamente!');
      return redirect()->route('color.index');
    }

    public function render()
    {
        $color = Color::orderBy('name', 'ASC')->paginate(16);
        return view('livewire.compra.color.color-component', ['colors' => $color]);
    }
}
