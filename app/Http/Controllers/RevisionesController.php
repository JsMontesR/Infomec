<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Revision;
use Illuminate\Validation\ValidationException;

class RevisionesController extends Controller
{

    public $validationRules = [
            'resultados_de_revision' => 'required',
            'fecha_de_garantia' => 'nullable|after_or_equal:today'
        ];

    public $validationIdRule = ['id' => 'required|integer'];

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
        $request->validate($this->validationIdRule);
        $request->validate($this->validationRules);

        $revision = new Revision;
       
        if(is_null(Revision::find($request->id))){
             $revision->id = $request->id;
         }else{
            throw ValidationException::withMessages(['id' => 'La orden de servicio con el id ingresado ya tiene una revisión asociada.']);
         }
        $revision->resultadosRevision = $request->resultados_de_revision;
        $revision->notasRevision = $request->notasRevision;
        $revision->fechaGarantia = $request->fecha_de_garantia;

        $revision->save();

        return back()->with('success', 'Revisión registrada');
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
        
        $revision = Revision::find($request->id);
        if(is_null($revision)){
            $this->throwNotFoundException();
        }
        $revision->resultadosRevision = $request->resultados_de_revision;
        $revision->notasRevision = $request->notasRevision;
        $revision->fechaGarantia = $request->fecha_de_garantia;

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
        $request->validate($this->validationIdRule);
        
        Revision::find($request->id)->delete();
        if(is_null($revision)){
            $this->throwNotFoundException();
        }
        return redirect()->route('revisiones')->with('success', 'Revision eliminada');
    }

    public function throwNotFoundException(){
        throw ValidationException::withMessages(['id' => 'El id ingresado no existe.']);
    }
}