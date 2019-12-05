<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Rol;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('rol')->unique();
            $table->timestamps();;
        });

        $admin = new Rol;
        $admin->rol = 'administrador';
        $admin->save();

        $tecnico = new Rol;
        $tecnico->rol = 'tecnico';
        $tecnico->save();

        $secretario = new Rol;
        $secretario->rol = 'secretario';
        $secretario->save();

        $cliente = new Rol;
        $cliente->rol = 'cliente';
        $cliente->save();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            Schema::dropIfExists('roles');
        });
    }
}
