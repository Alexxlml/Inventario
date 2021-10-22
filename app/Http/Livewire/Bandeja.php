<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Bandeja extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $producto_id;

    public function render()
    {
        return view('livewire.bandeja', [
            'productos' => DB::table('productos')
                ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
                ->select('productos.id', 'productos.nombre', 'categorias.nombre_categoria', 'sucursales.nombre_sucursal')
                ->where('productos.nombre', 'LIKE', "%{$this->search}%")
                ->orWhere('categorias.nombre_categoria', 'LIKE', "%{$this->search}%")
                ->orWhere('sucursales.nombre_sucursal', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function eliminar($id)
    {
        $this->producto_id = Producto::find($id);

        DB::transaction(function () {
            $this->producto_id->delete();
        });

        return redirect()->route('bandeja');
    }
}
