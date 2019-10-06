<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroPrediccion extends Model
{
    protected $table = 'registropredicciones';
    protected $fillable = ['id','enciende','apaga','inetcable','soinicia','ruidos','suena','lento','calienta','daimagen','energiza','pantazul','pantpixel','pantnegra','msgactiv','alarmdisk','horacorrecta','usbfunc','filecorrupt','bloquea','horasdia','aniocompra','spam','fallahard','fallasoft','idUsuario'];
}
