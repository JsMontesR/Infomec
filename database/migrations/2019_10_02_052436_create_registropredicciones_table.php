<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroprediccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registropredicciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('enciende');
            $table->string('apaga');
            $table->char('inetcable');
            $table->char('soinicia');
            $table->char('ruidos');
            $table->char('suena');
            $table->char('lento');
            $table->char('calienta');
            $table->char('daimagen');
            $table->char('energiza');
            $table->char('pantazul');
            $table->char('pantpixel');
            $table->char('pantnegra');
            $table->char('msgactiv');
            $table->char('alarmdisk');
            $table->char('horacorrecta');
            $table->char('usbfunc');
            $table->char('filecorrupt');
            $table->char('bloquea');
            $table->integer('horasdia');
            $table->integer('aniocompra');
            $table->char('spam');
            $table->string('fallahard');
            $table->string('fallasoft');
            $table->integer('idUsuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registropredicciones');
    }
}
