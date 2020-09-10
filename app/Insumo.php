<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $fillable = ['id','nombre','precioCompra','utilidad','cantidad','precioVenta','proveedor'];

    public function ventas()
    {
        return $this->belongsToMany(Venta::class,'venta_insumo')->withTimestamps();
    }
}
