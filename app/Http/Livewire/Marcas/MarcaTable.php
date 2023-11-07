<?php

namespace App\Http\Livewire\Marcas;

use App\Models\Marca;
use Livewire\Component;

class MarcaTable extends Component
{
    public $filtro;

    public function render()
    {
        $marcas = Marca::where('nombre', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.marcas.marca-table', compact('marcas'));
    }
}
