<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sucursal;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto;

class EditarProducto extends Component
{
    public $nombre, $descripcion, $categoria_seleccionada, $sucursal_seleccionada, $precio, $fecha_compra;
    public $categorias, $sucursales;
    public $producto, $estados, $estado_seleccionado, $comentarios;

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
}
