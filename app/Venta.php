<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable = ['id','fecha','valor'];

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class,'venta_insumo')->withTimestamps();
    }
}
