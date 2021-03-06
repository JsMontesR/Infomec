<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Servicio;
use App\Equipo;
use App\User;

class ServiciosController extends Controller
{
    public $validationRules = [
            'problema_reportado' => 'required',
            'id_del_equipo' => 'required|integer|min:0',
        ];
    public $validationIdRule = ['id' => 'required|integer|min:0'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $equipos = DB::table('equipos')->select(
            DB::raw('equipos.id as "Id"'),
            DB::raw('equipos.marca as "Marca"'),
            DB::raw('equipos.numeroSerie as "Serial"'),
            DB::raw('equipos.claveIngreso as "Clave"'),
            DB::raw('users.name as "Propietario"'),
            DB::raw('users.email as "Email"'),
            DB::raw('equipos.created_at as "Fecha de creación"'),
            DB::raw('equipos.updated_at as "Fecha de actualización"'))
         ->join('users','users.id','=','equipos.user_id')
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
        ->join('users','users.id','=','equipos.user_id')
            ->get();
        return view('crudservicios',compact('equipos','servicios'));
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
        $servicio = new Servicio;
        $servicio->problemaReportado = $request->problema_reportado;
        $servicio->notas = $request->notas;
        $servicio->equipo_id = $request->id_del_equipo;
        $servicio->save();
        return back()->with('success', 'Orden de servicio registrada');
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
        
        $servicio = Servicio::findOrFail($request->id);
        $servicio->problemaReportado = $request->problema_reportado;
        $servicio->notas = $request->notas;
        $servicio->equipo_id = $request->id_del_equipo;
        $servicio->save();
        return back()->with('success', 'Orden de servicio actualizada');
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
        
        Servicio::findOrFail($request->id)->delete();
        return redirect()->route('servicios')->with('success', 'Orden de servicio eliminada');
    }

    public function print(Request $request){
        $nombre = "Orden de servicio nº " . $request->id ;
        $equipoObj = Equipo::find($request->id_del_equipo);
        $cliente = User::find($equipoObj->user_id)->name;
        $fecha = Servicio::find($request->id)->created_at;
        $problema = $request->problema_reportado;
        if($request->notas != null){
            $notas = $request->notas;
        }else{
            $notas = null;
        }  
        $equipo = "Orden de servicio válida para equipo con identificación " . $equipoObj->id . " marca " . $equipoObj->marca;
        if($equipoObj->serial != null){
            $equipo = $equipo . " con serial " . $equipoObj->serial;
        }

        
        $pdf = \PDF::loadView('pdf.servicio',compact('nombre','cliente','fecha','problema','notas','equipo'));
        return $pdf->stream('servicio.pdf');
    }
}