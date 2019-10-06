<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diccionario extends Model
{
  protected $table = 'diccionario';
  protected $fillable = ['id','nombre','descripcion','tipo','tipodato','defect'];
}
