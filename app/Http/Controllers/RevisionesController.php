<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Revision;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $revisiones = DB::table('revisiones')->select(
            DB::raw('revisiones.id as "Id"'),
            DB::raw('revisiones.resultadosRevision as "Resultados"'),
            DB::raw('revisiones.notasRevision as "Notas"'),
            DB::raw('revisiones.fechaGarantia as "FechaGarantia"'),
            DB::raw('revisiones.created_at as "Fecha de creación"'),
            DB::raw('revisiones.updated_at as "Fecha de actualización"'))
       ->get();

        $servicios = DB::table('servicios')->select(
            DB::raw('servicios.id as Id'),
            DB::raw('servicios.created_at as "Fecha"'),
            DB::raw('servicios.problemaReportado as "Problemas"'),
            DB::raw('servicios.notas as "Notas"'),
            DB::raw('equipos.id as "IdEquipo"'),
            DB::raw('equipos.marca as "Marca"'),
            DB::raw('users.name as "Nombre cliente"'),
            DB::raw('users.email as "Correo electrónico cliente"'))
        ->join('equipos','equipos.id','=','servicios.equipo_id')
        ->join('users','users.email','=','equipos.user_email')
        ->leftJoin('revisiones','revisiones.id','=','servicios.id')
        ->whereNull('revisiones.id')
            ->get();

        return view('crudrevisiones',compact('revisiones','servicios'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revision = new Revision;
        $revision->id = $request->id;
        $revision->resultadosRevision = $request->resultadosRevision;
        $revision->notasRevision = $request->notasRevision;
        $revision->fechaGarantia = $request->fechaGarantia;

        $revision->save();

        return back()->with('success', 'Revisión registrado');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $revision = Revision::findOrFail($request->id);
        $revision->resultadosRevision = $request->resultadosRevision;
        $revision->notasRevision = $request->notasRevision;
        $revision->fechaGarantia = $request->fechaGarantia;

        $revision->save();

        return back()->with('success', 'Revisión actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Revision::findOrFail($request->id)->delete();
        return redirect()->route('revisiones')->with('success', 'Revision eliminada');
    }
}