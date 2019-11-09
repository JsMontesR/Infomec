<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\User;
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
            DB::raw('equipos.numeroSerie as "Serial"'),
            DB::raw('equipos.claveIngreso as "Clave"'),
            DB::raw('users.email as "Email"'),
            DB::raw('users.name as "Propietario"'),
             DB::raw('equipos.created_at as "Fecha de creación"'),
            DB::raw('equipos.updated_at as "Fecha de actualización"')
        )->join('users','users.email','=','equipos.user_email')
            ->get();

        $usuarios = DB::table('users')->select(DB::raw('id as Id'),DB::raw('email as "Email"'),DB::raw('name as "Nombre"'))->get();
        return view('crudequipos',compact('registros','usuarios'));
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
        $equipo->user_email = $request->user_email;
        $equipo->save();

        // Equipo::create($request->all());

        // User::findOrFail($request->user_email)->equipos()->save($equipo);

        return redirect()->route('equipos')->with('success', 'Equipo registrado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $equipo = Equipo::findOrFail($request->id);
        $equipo->marca = $request->marca;
        $equipo->numeroSerie = $request->numeroSerie;
        $equipo->claveIngreso = $request->claveIngreso;
        $equipo->user_email = $request->usuario;
        $equipo->save();

        return back()->with('success', 'Equipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Equipo::findOrFail($request->id)->delete();
        return redirect()->route('equipos')->with('success', 'Equipo eliminado');
    }
}
