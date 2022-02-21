<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "cedula",
        "nombre",
        "apellido",
        "telefono1",
        "telefono2",
        "direccion",
        "ciudad",
        "descripcion"
    ];

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }
}
