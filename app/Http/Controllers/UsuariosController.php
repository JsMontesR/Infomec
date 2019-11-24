<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use DB;
use Validator;

class UsuariosController extends Controller
{

    public $validationRules = [
            'name' => 'required',
            'email' => 'required|email',
            'cedula' => 'nullable|integer|min:0',
            'telefono' => 'nullable|integer|min:0',
            'password' => 'nullable|string|min:8',
        ];

    public $validationIdRule = ['id' => 'required|integer|min:0'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuarios = DB::table('users')->select(
        DB::raw('id as Id'),
        DB::raw('email as "Email"'),
        DB::raw('name as Name'),
        DB::raw('rol as Rol'),
        DB::raw('cedula as Cedula'),
        DB::raw('NIT as NIT'),
        DB::raw('telefono as Telefono'),
        DB::raw('direccion as Direccion'))
       ->get();

        $roles = DB::table('roles')->get();

        return view('crudusuarios',compact('usuarios','roles'));
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

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $this->validarYGuardarNIT($request,$usuario);
        if($request->password != null){
            $usuario->password = Hash::make($request->password);
        }else{
            throw ValidationException::withMessages(['password' => 'La contraseña es obligatoria',]);
        }
        $usuario->rol = $request->rol;
        $usuario->save();

        return redirect()->route('usuarios')->with('success', 'Usuario registrado');
    }

    public function validarYGuardarNIT(Request $request, User $usuario){
        $NITvalidator = Validator::make($request->all(), ['NIT' => 'nullable|regex:/(?<![\w\d])[0-9]+-[0-9]+(?![\w\d])/']);
        
        if ($NITvalidator->fails()) {
            throw ValidationException::withMessages(['NIT' => 'El NIT ingresado es incorrecto',]);
        }else{       
            $usuario->NIT = $request->NIT;
        }
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
        
        $usuario = User::findOrFail($request->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $this->validarYGuardarNIT($request,$usuario);
        if($request->password != null){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->rol = $request->rol;
        $usuario->save();

        return back()->with('success', 'Usuario actualizado');
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
        
        User::findOrFail($request->id)->delete();
        return redirect()->route('usuarios')->with('success', 'Usuario eliminado');
    }
}
