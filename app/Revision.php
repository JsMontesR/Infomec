<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table = 'revisiones';
    protected $fillable = ['servicio_id','resultadosRevision','notasRevision','fechaGarantia'];
}
