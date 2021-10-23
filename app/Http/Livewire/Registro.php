<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Registro extends Component
{
    public $nombre, $descripcion, $categoria_seleccionada, $sucursal_seleccionada, $precio, $fecha_compra;
    public $categorias, $sucursales;
    public $fecha_actual;

    protected $rules = [
        'nombre' => 'required|regex:/^([0-9a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\.\,\-\s]+)$/|max:30',
        'descripcion' => 'required|regex:/^([0-9a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\.\,\-\s]+)$/|max:100',
        'categoria_seleccionada' => 'required',
        'sucursal_seleccionada' => 'required',
        'precio' => 'required|regex:/^([1-9][0-9]{0,4})$/',
        'fecha_compra' => 'required',
    ];

    protected $messages = [
        'nombre.required' => 'Este campo no puede permanecer vacío',
        'nombre.regex' => 'Solo se permiten letras, números, puntos, comas y giones medios',
        'nombre.max' => 'Se permiten 30 caracteres como máximo',
        'descripcion.required' => 'Este campo no puede permanecer vacío',
        'descripcion.regex' => 'Solo se permiten letras, números, puntos, comas y giones medios',
        'descripcion.max' => 'Se permiten 100 caracteres como máximo',
        'categoria_seleccionada.required' => 'Este campo no puede permanecer vacío',
        'sucursal_seleccionada.required' => 'Este campo no puede permanecer vacío',
        'precio.required' => 'Este campo no puede permanecer vacío',
        'precio.regex' => 'Solo se permiten 5 dígitos como máximo entre el 1 y el 99999',
        'fecha_compra.required' => 'Este campo no puede permanecer vacío',
    ];

    // ? Inicio Alertas
    protected $listeners = [
        'registrar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló el registro', [
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
        $this->confirm('¿Quieres realizar este registro', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'registrar',
            'onCancelled' => 'cancelled'
        ]);
    }
    // ! Fin Alertas

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->sucursales = Sucursal::all();
        $this->fecha_actual = Carbon::today()->isoFormat('YYYY-MM-DD');
    }

    public function render()
    {
        abort_if(Auth::user()->profile_id == 2, 401);
        return view('livewire.registro');
    }

    public function registrar()
    {

        $this->validate();

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
                        'comentarios' => NULL,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            );

            $this->flash('success', 'El producto ha sido registrado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('registro');
            
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
