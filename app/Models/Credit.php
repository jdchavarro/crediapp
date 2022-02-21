<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        "client_id",
        "numeroFactura",
        "montoBase",
        "totalFactura",
        "cuotaInicial",
        "valorCuota",
        "saldo",
        "cuotas",
        "descripcion",
        "fecha"
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
