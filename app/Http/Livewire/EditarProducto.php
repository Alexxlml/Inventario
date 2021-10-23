<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use App\Models\Estado;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class EditarProducto extends Component
{
    public $nombre, $descripcion, $categoria_seleccionada, $sucursal_seleccionada, $precio, $fecha_compra;
    public $categorias, $sucursales;
    public $producto, $prod_edit, $estados, $estado_seleccionado, $comentarios;

    protected $rules = [
        'estado_seleccionado' => 'required',
        'comentarios' => 'required|max:100',
    ];

    protected $messages = [
        'estado_seleccionado.required' => 'Este campo no puede permanecer vacío',
        'comentarios.required' => 'Este campo no puede permanecer vacío',
        'comentarios.max' => 'Se permiten 100 caracteres como máximo',
    ];

    // ? Inicio Alertas
    protected $listeners = [
        'guardar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la operación', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }

    public function triggerConfirm()
    {
        $this->confirm('¿Quieres guardar la nueva información de este producto?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'guardar',
            'onCancelled' => 'cancelled'
        ]);
    }
    // ! Fin Alertas

    public function mount($id)
    {
        $this->categorias = Categoria::all();
        $this->sucursales = Sucursal::all();
        $this->estados = Estado::all();

        $this->producto = Producto::find($id);
        $this->nombre = $this->producto->nombre;
        $this->descripcion = $this->producto->descripcion;
        $this->categoria_seleccionada = $this->producto->categoria_id;
        $this->sucursal_seleccionada = $this->producto->sucursal_id;
        $this->precio = $this->producto->precio;
        $this->fecha_compra = $this->producto->fecha_compra;
        $this->estado_seleccionado = $this->producto->estado_id;
        $this->comentarios = $this->producto->comentarios;
    }
    
    public function render()
    {
        return view('livewire.editar-producto');
    }

    public function guardar(){
        $this->validate();

        try {
            DB::transaction(
                function () {
                    $this->producto->estado_id = $this->estado_seleccionado;
                    $this->producto->comentarios = $this->comentarios;
                    $this->producto->updated_at = Carbon::now();

                    $this->producto->save();
                }
            );

            $this->flash('success', 'La información del producto ha sido guardada con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->to('/edit/' . $this->producto->id);
        } catch (Exception $ex) {
            $this->alert('error', 'Ha ocurrido un error', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }
}
