<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['id','marca','numeroSerie','claveIngreso','user_email'];

    public function usuario(){
    	return $this->hasOne(User::class);
    }
}
