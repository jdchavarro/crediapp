<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "numero",
        'credit_id',
        'fecha',
        'valor'
    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
