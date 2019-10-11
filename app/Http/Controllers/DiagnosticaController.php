<?php

namespace App\Http\Controllers;

use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\ArrayDataset;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Illuminate\Http\Request;
use App\RegistroPrediccion;
use App\Diccionario;
use Phpml\Metric\Accuracy;
use DB;

class DiagnosticaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnostica = DB::table('diccionario')->get();
        return view('diagnostica',compact('diagnostica'));
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
    public function predict(Request $request)
    {
        $samplesdb = DB::table('repodiagnosticos')->get()->toArray();

        $labelshard = DB::table('repodiagnosticos')->get('fallahard')->toArray();

        $labelssoft = DB::table('repodiagnosticos')->get('fallasoft')->toArray();

        $diagnostica = DB::table('diccionario')->get();


        //Crear tupla para la predicción basada en el formulario
        $p = 0;
        foreach ($diagnostica as $key => $value) {
            if($request->{$value->nombre}!=null){
                if($request->{$value->nombre}==='on'){
                    $valor = 's';
                }else{
                    $valor = $request->{$value->nombre};
                }
                
            }else{
                $valor = $value->defect;
            }

            if($value->tipodato === 'open'){
                $sampleoriginal[$value->nombre] = (int)$valor;
                $sample[$p] = (int)$valor;
            }else{
                $sampleoriginal[$value->nombre] = $valor;
                $sample[$p] = $valor;
            }
            ++$p;
           
        }
       

        //Pasar el dataset de stdClass a Array
        for ($i=0; $i <count($samplesdb); $i++) { 
            $samples[$i] = (array)$samplesdb[$i];
            $newkey = 0;
            foreach ($samples[$i] as $key => $value) {
                $samples[$i][$newkey] = $value;
                unset($samples[$i][$key]);
                ++$newkey;
            }
        }
       
        
        //Pasar las etiquetas falla hardware de stdClass a Array
        for ($i=0; $i <count($labelshard) ; $i++) { 
            $labels[$i] = $labelshard[$i]->fallahard;
        }

        $dataset = new ArrayDataset($samples,$labels);
       

        $prediction1 = $this->processPredict($dataset,$sample);

        //Pasar las etiquetas falla software de stdClass a Array
         for ($i=0; $i <count($labelssoft) ; $i++) { 
            $labels[$i] = $labelssoft[$i]->fallasoft;
        }

        $dataset = new ArrayDataset($samples,$labels);

        $prediction2 = $this->processPredict($dataset,$sample);

        //Retornar la predicción

        $respuesta = "Desde el punto de vista del hardware el posible daño detectado es: "  . $prediction1[0] . ", y desde el punto de vista del software el posible daño detectado es: " . $prediction2[1] .".";

        //Se guarda la predicción el la BD

        $this->recordPrediction($sampleoriginal,$prediction1[1],$prediction2[1]);


        session()->flash('predict', $respuesta);
        return redirect()->back();
    }

    /**
     * Entrena un algoritmo naive bayes y arroja una predicción
     *
     * @param  int  $dataset el set de datos de entrenamiento sin los valores de las etiquetas
     * @param  var  $sample el ejemplo a predecir
     * @return var valor de la predicción
     */

    public function processPredict(ArrayDataset $dataset, $sample){

        $longitud = count($dataset->getSamples()[0]);
        $dataset->removeColumns([$longitud-1,$longitud-2]);
        $split = new StratifiedRandomSplit($dataset, 0.2);
        $classifier = new NaiveBayes();
        $classifier->train($split->getTrainSamples(),$split->getTrainLabels());
        $precision =Accuracy::score($split->getTestLabels(),$classifier->predict($split->getTestSamples())); 
        $prediction = $classifier->predict($sample);
        return [$prediction . ' con una precisión del '. round($precision*100,2) . '%', $prediction]  ;
    }

    /**
     * Guarda las predicciones realizadas en la base de datos.
     *
     * @param  var  $sample valor de la predicción original (con sus llaves originales)
     * @param  var  $prediction1 valor de la predicción 1 hardware
     * @param  var  $prediction2 valor de la predicción 2 software
     */

    public function recordPrediction($sample,$prediction1,$prediction2){
        
        $sample['fallahard'] = $prediction1;
        $sample['fallasoft'] = $prediction2;
        $sample['idUsuario'] = auth()->user()->id;
        RegistroPrediccion::create($sample);

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
