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
        $rutapdf = 'reportepredfecha.pdf';

         return view('reporteweb',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte, "rutapdf" => $rutapdf]);
    }

    public function prediccionesUsuario(){
        $nombrereporte = "Cantidad de predicciones hechas por usuario";
        $rutapdf = 'reportusuarios.pdf';

         return view('reporteweb',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte, "rutapdf" => $rutapdf]);
    }

    public function prediccionesFallaSoft(){
        $nombrereporte = "Daños de software más frecuentes";
        $rutapdf = 'reportfallasoft.pdf';

         return view('reporteweb',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte, "rutapdf" => $rutapdf]);
    }

    public function prediccionesFallaHard(){
        $nombrereporte = "Daños de hardware más frecuentes";
        $rutapdf = 'reportfallahard.pdf';

         return view('reporteweb',["registros" => $this->consultar($nombrereporte), "nombrereporte" => $nombrereporte, "rutapdf" => $rutapdf]);
    }



    /*
    *    Generación de PDFs
    */


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

    public function prediccionesFallaSoftPdf(){

            $nombrereporte = "Daños de software más frecuentes";
            $registros = $this->consultar($nombrereporte);

            $pdf = \PDF::loadView('pdf.reporte',compact('registros','nombrereporte'));
            return $pdf->download('reporte.pdf');
    }

    public function prediccionesFallaHardPdf(){

            $nombrereporte = "Daños de hardware más frecuentes";
            $registros = $this->consultar($nombrereporte);

            $pdf = \PDF::loadView('pdf.reporte',compact('registros','nombrereporte'));
            return $pdf->download('reporte.pdf');
    }








     public function consultar($tipo){

        if(!strcmp($tipo,"Cantidad de predicciones hechas por mes")){
            
         return DB::table('registropredicciones')
                    ->select(DB::raw('DATE_FORMAT(created_at,"%m/%Y") as Mes'),DB::raw('COUNT(*) as "Cantidad de predicciones"'))
                    ->groupBy(DB::raw('DATE_FORMAT(created_at,"%m/%Y")'))
                    ->get();

        }elseif(!strcmp($tipo,"Cantidad de predicciones hechas por usuario")){

          return DB::table('registropredicciones')->join('users','idUsuario','=','users.id')
                    ->select(DB::raw('users.id as Id'),DB::raw('users.name as Usuario'),DB::raw('COUNT(*) AS "Cantidad de consultas realizada"'),DB::raw('round(100*COUNT(*)/(SELECT COUNT(*) FROM registropredicciones),1) AS "Porcentaje de predicciones %"'))
                    ->groupBy(DB::raw('users.id'),DB::raw('users.name'))
                    ->get(); 

        }else if(!strcmp($tipo,"Daños de software más frecuentes")){

            return DB::table('registropredicciones')->select(DB::raw('registropredicciones.fallasoft AS "Falla de software"'),DB::raw('COUNT(*) AS "Frecuencia"'))->groupBy(DB::raw('registropredicciones.fallasoft'))->get();

        }else if(!strcmp($tipo,"Daños de hardware más frecuentes")){

            return DB::table('registropredicciones')->select(DB::raw('registropredicciones.fallahard AS "Falla de hardware"'),DB::raw('COUNT(*) AS "Frecuencia"'))->groupBy(DB::raw('registropredicciones.fallahard'))->get();
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
