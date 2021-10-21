<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sucursal;
use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class Registro extends Component
{
    public $nombre, $descripcion, $categoria_seleccionada, $sucursal_seleccionada, $precio, $fecha_compra;
    public $categorias, $sucursales;

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->sucursales = Sucursal::all();
    }

    public function render()
    {
        return view('livewire.registro');
    }

    public function registrar()
    {

        try {
            DB::transaction(
                function () {
                    Producto::create([
                        'nombre' => $this->nombre,
                        'descripcion' => $this->descripcion,
                        'categoria_id' => $this->categoria_seleccionada,
                        'sucursal_id' => $this->sucursal_seleccionada,
                        'estado_id' => 1,
                        'precio' => $this->precio,
                        'fecha_compra' => $this->fecha_compra,
                        'fecha_modificacion' => Carbon::today()->isoFormat('YYYY-MM-DD'),
                        'comentarios' => NULL,
                    ]);
                }
            );

            return redirect()->route('registro');
        } catch (Exception $ex) {
            dd($ex);
        }
    }
}
