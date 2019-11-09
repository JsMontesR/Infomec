<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $proveedores = DB::table('proveedores')->select(
            DB::raw('proveedores.id as "Id"'),
            DB::raw('proveedores.nombre as "Nombre"'),
            DB::raw('proveedores.email as "Email"'),
            DB::raw('proveedores.telefono as "Telefono"'),
            DB::raw('proveedores.direccion as "Direccion"'),
            DB::raw('proveedores.NIT as "NIT"'),
            DB::raw('proveedores.descripcion as "Descripcion"'),
            DB::raw('proveedores.created_at as "Fecha de creación"'),
            DB::raw('proveedores.updated_at as "Fecha de actualización"'))
       ->get();

        return view('crudproveedores',compact('proveedores'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor;
        $proveedor->id = $request->id;
        $proveedor->nombre = $request->nombre;
        $proveedor->email = $request->email;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->NIT = $request->NIT;
        $proveedor->descripcion = $request->descripcion;

        $proveedor->save();

        return back()->with('success', 'Proveedor registrado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->nombre = $request->nombre;
        $proveedor->email = $request->email;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->NIT = $request->NIT;
        $proveedor->descripcion = $request->descripcion;

        $proveedor->save();

        return back()->with('success', 'Proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Proveedor::findOrFail($request->id)->delete();
        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado');
    }
}
