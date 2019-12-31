<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\User;
use Illuminate\Http\Request;
use DB;



class EquiposController extends Controller
{

    public $validationRules = [
            'user_id' => 'required',
            'marca' => 'required',
        ];

    public $validationIdRule = ['id' => 'required|integer'];

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
            DB::raw('users.id as "Id propietario"'),
            DB::raw('users.name as "Propietario"'),
             DB::raw('equipos.created_at as "Fecha de creación"'),
            DB::raw('equipos.updated_at as "Fecha de actualización"')
        )->join('users','users.id','=','equipos.user_id')
            ->get();

        $usuarios = DB::table('users')->select(DB::raw('id as Id'),DB::raw('name as "Nombre"'),DB::raw('cedula as "Cedula"'),DB::raw('email as "Email"'))->get();
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
        $request->validate($this->validationRules);

        $equipo = new Equipo;
        $equipo->marca = $request->marca;
        $equipo->numeroSerie = $request->numeroSerie;
        $equipo->claveIngreso = $request->claveIngreso;
        $equipo->user_id = $request->user_id;
        $equipo->save();

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

        $request->validate($this->validationIdRule);
        $request->validate($this->validationRules);
        

        $equipo = Equipo::findOrFail($request->id);
        $equipo->marca = $request->marca;
        $equipo->numeroSerie = $request->numeroSerie;
        $equipo->claveIngreso = $request->claveIngreso;
        $equipo->user_id = $request->user_id;
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
        $request->validate($this->validationIdRule);
        Equipo::findOrFail($request->id)->delete();
        return redirect()->route('equipos')->with('success', 'Equipo eliminado');
    }
}
