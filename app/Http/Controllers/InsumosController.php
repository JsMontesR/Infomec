<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Insumo;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = DB::table('insumos')->select(
            DB::raw('insumos.id as "Id"'),
            DB::raw('insumos.nombre as "Nombre"'),
            DB::raw('insumos.proveedor_id as "Proveedor"'),
            DB::raw('proveedores.nombre as "Nombre proveedor"'),
            DB::raw('insumos.precioCompra as "Precio de compra"'),
            DB::raw('insumos.cantidad as "Cantidad"'),
            DB::raw('insumos.utilidad as "Utilidad"'),
            DB::raw('insumos.precioVenta as "Precio de venta"'),
            DB::raw('insumos.created_at as "Fecha de creación"'),
            DB::raw('insumos.updated_at as "Fecha de actualización"'))
        ->join('proveedores','proveedores.id','=','insumos.proveedor_id')
       ->get();

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


        return view('crudinsumos',compact('insumos','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumo = new Insumo;
        $insumo->id = $request->id;
        $insumo->nombre = $request->nombre;
        $insumo->proveedor_id = $request->proveedor_id;
        $insumo->precioCompra = $request->precioCompra;
        $insumo->cantidad = $request->cantidad;
        $insumo->utilidad = $request->utilidad;
        $insumo->precioVenta = $request->precioVenta;

        $insumo->save();

        return back()->with('success', 'Insumo registrado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $insumo = Insumo::findOrFail($request->id);
        $insumo->nombre = $request->nombre;
        $insumo->proveedor_id = $request->proveedor_id;
        $insumo->precioCompra = $request->precioCompra;
        $insumo->cantidad = $request->cantidad;
        $insumo->utilidad = $request->utilidad;
        $insumo->precioVenta = $request->precioVenta;

        $insumo->save();

        return back()->with('success', 'Insumo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Insumo::findOrFail($request->id)->delete();
        return redirect()->route('proveedores')->with('success', 'Insumo eliminado');
    }
}
