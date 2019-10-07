<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Imports\RepoImport;

class CreateRepodiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repodiagnosticos', function (Blueprint $table) {
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

        });

        // Excel::import(new RepoImport, 'basedata.basedata.csv');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repodiagnosticos');
    }
}
