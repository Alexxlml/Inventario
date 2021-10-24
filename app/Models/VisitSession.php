<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitSession extends Model
{
    use HasFactory;

    protected $table = 'visit_session';

    protected $fillable = [
        'user_id',
        'user_agent',
    ];

    // * Relacion muchos a uno
    public function categorias()
    {
        return $this->belongsTo('App\Models\User');
    }
}
