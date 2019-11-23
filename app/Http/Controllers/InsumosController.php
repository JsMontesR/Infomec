<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Insumo;

class InsumosController extends Controller
{

    public $validationRules = [
            'nombre' => 'required',
            'precio_de_compra' => 'required|integer',
            'utilidad' => 'required|integer',
            'cantidad' => 'required|integer',
            'precio_de_venta' => 'required|numeric',
            'id_del_proveedor' => 'required|numeric',
        ];

    public $validationIdRule = ['id' => 'required|integer'];

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
        $request->validate($this->validationRules);

        $insumo = new Insumo;
        $insumo->nombre = $request->nombre;
        $insumo->proveedor_id = $request->id_del_proveedor;
        $insumo->precioCompra = $request->precio_de_compra;
        $insumo->cantidad = $request->cantidad;
        $insumo->utilidad = $request->utilidad;
        $insumo->precioVenta = $request->precio_de_venta;

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

        $request->validate($this->validationIdRule);
        $request->validate($this->validationRules);

        $insumo = Insumo::findOrFail($request->id);
        $insumo->nombre = $request->nombre;
        $insumo->proveedor_id = $request->id_del_proveedor;
        $insumo->precioCompra = $request->precio_de_venta;
        $insumo->cantidad = $request->cantidad;
        $insumo->utilidad = $request->utilidad;
        $insumo->precioVenta = $request->precio_de_venta;

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

        $request->validate($this->validationIdRule);

        Insumo::findOrFail($request->id)->delete();
        return redirect()->route('proveedores')->with('success', 'Insumo eliminado');
    }
}
