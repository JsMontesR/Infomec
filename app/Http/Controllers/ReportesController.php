<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes');
    }

    public function prediccionesFecha(){

        $nombrereporte = "Cantidad de predicciones hechas por mes";

         return view('reportepredfecha',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte]);
    }

    public function prediccionesUsuario(){
        $nombrereporte = "Cantidad de predicciones hechas por usuario";

         return view('reporteusuarios',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte]);
    }

    public function prediccionesFechaPdf()
    {
           
            $nombrereporte = "Cantidad de predicciones hechas por mes";
            $registros = $this->consultar($nombrereporte);

            $pdf = \PDF::loadView('pdf.reporte',compact('registros','nombrereporte'));
            return $pdf->download('reporte.pdf');
    }

    public function prediccionesUsuarioPdf(){

            $nombrereporte = "Cantidad de predicciones hechas por usuario";
            $registros = $this->consultar($nombrereporte);

            $pdf = \PDF::loadView('pdf.reporte',compact('registros','nombrereporte'));
            return $pdf->download('reporte.pdf');
    }

     public function consultar($tipo){

        if(!strcmp($tipo,"Cantidad de predicciones hechas por mes")){
         return DB::table('registropredicciones')
                    ->select(DB::raw('DATE_FORMAT(created_at,"%M %Y") as Mes'),DB::raw('COUNT(*) as "Cantidad de predicciones"'))
                    ->groupBy(DB::raw('DATE_FORMAT(created_at,"%M %Y")'))
                    ->get();

        }elseif(!strcmp($tipo,"Cantidad de predicciones hechas por usuario")){
          return DB::table('registropredicciones')->join('users','idUsuario','=','users.id')
                    ->select(DB::raw('users.id as Id'),DB::raw('users.name as Usuario'),DB::raw('COUNT(*) AS "Cantidad de consultas realizada"'),DB::raw('round(100*COUNT(*)/(SELECT COUNT(*) FROM registropredicciones),1) AS "Porcentaje de predicciones %"'))
                    ->groupBy(DB::raw('users.id'))
                    ->get(); 
        }else if(strcmp($tipo,"Cantidad de predicciones hechas por usuario")){


        }

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
