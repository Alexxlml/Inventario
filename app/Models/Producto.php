<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
        'sucursal_id',
        'estado_id',
        'precio',
        'fecha_compra',
        'comentarios',
    ];

    // * Relacion muchos a uno
    public function categorias()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
    public function sucursales()
    {
        return $this->belongsTo('App\Models\Sucursal');
    }
    public function estados()
    {
        return $this->belongsTo('App\Models\Estado');
    }
}
