<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';

    public $timestamps = false;

    protected $fillable = [
        'nombre_sucursal'
    ];

    // * Relacion uno a muchos
    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }
}
