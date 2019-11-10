<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserCanLoadPagesTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function testUserCanBeRedirectedToLoginPage()
    {


        $this->get('/')->assertRedirect('login');


    }

     public function testUserCanLoadLoginPage()
    {




        $this->get('/login')
                         ->assertStatus(200)
                         ->assertSee('Registrar');


    }

    public function testUserCanLoadRegisterPage()
    {

        $this->get('/register')
                         ->assertStatus(200)
                         ->assertSee('Registrar');


    }

    public function testUserCanLoadMainPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/')
                         ->assertStatus(200)
                         ->assertSee('Infomec');


    }

    public function testUserCanLoadDiagnosticosPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/diagnostica')
                         ->assertStatus(200)
                         ->assertSee('Diagnóstico');


    }

    public function testUserCanLoadEquiposPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/equipos')
                         ->assertStatus(200)
                         ->assertSee('Equipos');


    }

     public function testUserCanLoadInsumosPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/insumos')
                         ->assertStatus(200)
                         ->assertSee('Insumos');


    }

    public function testUserCanLoadProveedoresPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/proveedores')
                         ->assertStatus(200)
                         ->assertSee('Proveedores');


    }

    public function testUserCanLoadReportesPage()
    {

        $user = factory(User::class)->create();
        $user->rol = 'administrador';

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/reportes')
                         ->assertStatus(200)
                         ->assertSee('Reportes');


    }

    public function testUserCanLoadRevisionesPage()
    {

        $user = factory(User::class)->create();
        $user->rol = 'administrador';

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/revisiones')
                         ->assertStatus(200)
                         ->assertSee('Revisiones');


    }

    public function testUserCanLoadOrdenesDeServicioPage()
    {

        $user = factory(User::class)->create();

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/ordenesServicio')
                         ->assertStatus(200)
                         ->assertSee('servicio');


    }

    public function testUserCanLoadUsuariosPage()
    {

        $user = factory(User::class)->create();
        $user->rol = 'administrador';

        $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/usuarios')
                         ->assertStatus(200)
                         ->assertSee('Usuarios');


    }

}
