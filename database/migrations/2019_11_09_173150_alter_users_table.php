<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol')->default('cliente');
            $table->foreign('rol')->references('rol')->on('roles')->onDelete('cascade');
        });


        $user = new User;
        $user->id = 0;
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->rol = 'administrador';
        $user->password = Hash::make('1234');
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
