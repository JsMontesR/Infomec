<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Venta;
use Illuminate\Support\Facades\Log;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = DB::table('ventas')->select(
            DB::raw('ventas.id as Id'),
            DB::raw('users.cedula as "Cedula del cliente"'),
            DB::raw('users.name as "Nombre del cliente"'),
            DB::raw('users.id as "Id cliente"'),
            DB::raw('valor as Valor'),
            DB::raw('ventas.created_at as "Fecha de creación"'),
            DB::raw('ventas.updated_at as "Fecha de actualización"')
        )->join('users','users.id','=','ventas.user_id')
            ->get();

        $insumos =  DB::table('insumos')->select(DB::raw('id as Id'),DB::raw('nombre as "Nombre"'),DB::raw('precioVenta as "Precio"'),DB::raw('cantidad as "Stock"'))->get();

        $usuarios = DB::table('users')->select(DB::raw('id as Id'),DB::raw('name as "Nombre"'),DB::raw('cedula as "Cedula"'),DB::raw('email as "Email"'))->get();
        return view('crudventas',compact('registros','usuarios','insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipo::findOrFail($id)->delete();
        return redirect()->route('equipos')->with('success', 'Equipo eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function obtenerInsumosDeUnaVenta($id){
        $venta = Venta::findOrFail($id);
        Log::info("La venta" . $venta);
        foreach($venta->insumos as $i){
            Log::info($i);
        }
        return $venta->insumos;
    }
}
