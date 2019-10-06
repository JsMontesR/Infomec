<?php

use Illuminate\Database\Seeder;
use App\Diccionario;

class DiccionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Diccionario::truncate();

    	Diccionario::create([
    		'id' => 0,
    		'nombre' => 'enciende'
    		'descripcion' => 'El equipo enciende?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 1,
    		'nombre' => 'apaga'
    		'descripcion' => 'El equipo se apaga?'
    		'tipo' => 'f'
    		'tipodato' => 'open'
    	])

    	Diccionario::create([
    		'id' => 2,
    		'nombre' => 'inetcable'
    		'descripcion' => 'El equipo conecta a internet por cable?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 3,
    		'nombre' => 'soinicia'
    		'descripcion' => 'El sistema operativo inicia?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 4,
    		'nombre' => 'ruidos'
    		'descripcion' => 'El equipo hace ruidos raros?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 5,
    		'nombre' => 'suena'
    		'descripcion' => 'El equipo reproduce sonido?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 6,
    		'nombre' => 'lento'
    		'descripcion' => 'El equipo es muy lento?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 7,
    		'nombre' => 'calienta'
    		'descripcion' => 'El equipo se sobrecalienta?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 8,
    		'nombre' => 'daimagen'
    		'descripcion' => 'El equipo muestra imagen?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 9,
    		'nombre' => 'energiza'
    		'descripcion' => 'El equipo se energiza al conectarlo a la corriente?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 10,
    		'nombre' => 'pantazul'
    		'descripcion' => 'El equipo muestra una pantalla azul?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 11,
    		'nombre' => 'pantpixel'
    		'descripcion' => 'El equipo muestra la pantalla pixelada o distorsionada?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 12,
    		'nombre' => 'pantnegra'
    		'descripcion' => 'El equipo se queda en una pantalla negra?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 13,
    		'nombre' => 'msgactiv'
    		'descripcion' => 'El equipo constantemente muestra mensajes de aactivación de software?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 14,
    		'nombre' => 'alarmdisk'
    		'descripcion' => 'El equipo muestra advertencias sobre daño en disco?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 15,
    		'nombre' => 'horacorrecta'
    		'descripcion' => 'El equipo muestra correctamente la hora?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 16,
    		'nombre' => 'usbfunc'
    		'descripcion' => 'Al equipo le funcionan sus puertos USB?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 17,
    		'nombre' => 'filecorrupt'
    		'descripcion' => 'El equipo muestra archivos corruptos?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 18,
    		'nombre' => 'bloquea'
    		'descripcion' => 'El equipo se bloquea?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])

    	Diccionario::create([
    		'id' => 19,
    		'nombre' => 'horasdia'
    		'descripcion' => 'Cuantas horas al día usa su equipo?'
    		'tipo' => 'f'
    		'tipodato' => 'open'
    	])

    	Diccionario::create([
    		'id' => 20,
    		'nombre' => 'aniocompra'
    		'descripcion' => 'En que año compró el equipo?'
    		'tipo' => 'f'
    		'tipodato' => 'open'
    	])

    	Diccionario::create([
    		'id' => 21,
    		'nombre' => 'spam'
    		'descripcion' => 'El equipo muestra constantemente mensajes de spam?'
    		'tipo' => 'f'
    		'tipodato' => 'yesno'
    	])
    }
}
