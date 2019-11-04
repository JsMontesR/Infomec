<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table = 'revisiones';
    protected $fillable = ['id','fechaDespacho','resultadosRevision','notasRevision','fechaGarantia'];
}
