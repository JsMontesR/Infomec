<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;
use DB;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = DB::table('equipos')->select(
            DB::raw('equipos.id as "Id"'),
            DB::raw('equipos.marca as "Marca"'),
            DB::raw('equipos.claveIngreso as "Clave"'),
            DB::raw('users.email as "Correo propietario"'),
            DB::raw('users.name as "Nombre propietario"'),
             DB::raw('equipos.created_at as "Fecha de creación"'),
            DB::raw('equipos.updated_at as "Fecha de actualización"')
        )->join('users','users.email','=','equipos.user_email')
            ->get();

        $usuarios = DB::table('users')->select(DB::raw('id as Id'),DB::raw('email as "Email"'))->get();
        return view('crudequipos',compact('registros','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipo;
        $equipo->marca = $request->marca;
        $equipo->numeroSerie = $request->numeroSerie;
        $equipo->claveIngreso = $request->claveIngreso;
        $equipo->user_email = $request->usuario;

        $equipo->save();

        return back()->with('success', 'Equipo registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
