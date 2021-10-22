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

    public function render()
    {
        return view('livewire.bandeja', [
            'productos' => DB::table('productos')
                ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
                ->select('productos.id', 'productos.nombre', 'categorias.nombre_categoria', 'sucursales.nombre_sucursal')
                ->where('nombre', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage),
        ]);
    }
}
