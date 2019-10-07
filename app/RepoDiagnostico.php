<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepoDiagnostico extends Model
{
    protected $table = 'repodiagnosticos';
    protected $fillable = ['enciende','apaga','inetcable' ,'soinicia' ,'ruidos','suena','lento' ,'calienta' ,'daimagen' ,'energiza' ,'pantazul','pantpixel' ,'pantnegra' ,'msgactiv' ,'alarmdisk','horacorrecta' ,'usbfunc' ,'filecorrupt' ,'bloquea' ,'horasdia' ,'aniocompra' ,'spam' ,'fallahard','fallasoft' ];
}
