<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Diccionario;

class CreateDiccionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diccionario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('tipodato');
            $table->string('defect')->nullable();
            $table->date('updated_at');
            $table->date('created_at');
        });

        Diccionario::create([
            'nombre' => 'enciende',
            'descripcion' => '¿Su equipo enciende?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'apaga',
            'descripcion' => '¿Al cuanto tiempo de encendido se apaga su equipo? (si no se apaga no ingrese ningún valor)',
            'tipodato' => 'open',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'inetcable',
            'descripcion' => '¿Su equipo conecta a internet por cable?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'soinicia',
            'descripcion' => '¿El sistema operativo del equipo inicia?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'ruidos',
            'descripcion' => '¿Su equipo hace ruidos raros?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'suena',
            'descripcion' => '¿Su equipo reproduce sonido?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'lento',
            'descripcion' => '¿Su equipo está lento?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'calienta',
            'descripcion' => '¿Su equipo se sobrecalienta?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'daimagen',
            'descripcion' => '¿Su equipo muestra imagen?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'energiza',
            'descripcion' => '¿Su equipo se energiza al conectarlo a la corriente?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'pantazul',
            'descripcion' => '¿Su equipo muestra una pantalla azul?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'pantpixel',
            'descripcion' => '¿Su equipo muestra la pantalla pixelada o distorsionada?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'pantnegra',
            'descripcion' => '¿Su equipo se queda en una pantalla negra?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'msgactiv',
            'descripcion' => '¿Su equipo constantemente muestra mensajes de activación de software?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'alarmdisk',
            'descripcion' => '¿Su equipo muestra advertencias sobre daño en disco?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'horacorrecta',
            'descripcion' => '¿Su equipo muestra correctamente la hora?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'usbfunc',
            'descripcion' => '¿A su equipo le funcionan sus puertos USB?',
            'tipodato' => 'yesno',
            'defect' => 's',
        ]);

        Diccionario::create([
            'nombre' => 'filecorrupt',
            'descripcion' => '¿Su equipo muestra archivos corruptos?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'bloquea',
            'descripcion' => '¿Su equipo se bloquea?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

        Diccionario::create([
            'nombre' => 'horasdia',
            'descripcion' => '¿Cuantas horas al día usa su equipo?',
            'tipodato' => 'open',
            'defect' =>'1',
        ]);

        Diccionario::create([
            'nombre' => 'aniocompra',
            'descripcion' => '¿Cuantos años de comprado tiene su equipo?',
            'tipodato' => 'open',
            'defect' => '1',
        ]);

        Diccionario::create([
            'nombre' => 'spam',
            'descripcion' => '¿Su equipo muestra constantemente mensajes de spam?',
            'tipodato' => 'yesno',
            'defect' => 'n',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diccionario');
    }
}
