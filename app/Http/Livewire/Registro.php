<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sucursal;
use App\Models\Categoria;

class Registro extends Component
{
public $nombre, $descripcion,$categoria_seleccionada, $sucursales_seleccionada, $precio, $fecha_compra;
public $categorias, $sucursales;

    public function mount(){
        $this->categorias = Categoria::all();
        $this->sucursales = Sucursal::all();
    }

    public function render()
    {
        return view('livewire.registro');
    }
}
