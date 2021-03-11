<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionLibroPrestamo;
use App\Models\Libro;
use App\Models\LibroPrestamo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class LibroPrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        /*Esta variable traerá la información id, nombre de la 
        relación usuaio, y todos los datos de la relación libro
        De esta manera se hace una consulta más eficiente de los datos concretos a utilizar
        Evitamos hacer consultas innecesarias*/
        $libros = LibroPrestamo::with('usuario:id,nombre', 'libro')->orderBy('fecha_prestamo')->get();
        return view('libro-prestamo.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        /* Esta variable declara una función que trae todos los libros que no están prestados,
        en este caso, los que tengan fecha de devolución nula, son los que no están prestados;
        Si la fecha de devolución no es nula, es porque se ha devuelto y el libro se podrá listar 
        $libros = Libro::whereDoesntHave('prestamo', function(Builder $query){
            $query->whereNull('fecha_devolucion');
        })->get(); */
        /* 1) La función withCount permitirá saber Cuántas veces esta este libro en la tabla libro 
        prestamo con una fecha de devolución nula, y eso nos da la cantidad de veces que ese 
        libro está prestado; si el libro no está prestado, devuelve que no está prestado, es decir, 
        0 veces.
        
        2) Decir si la cantidad de veces que está prestado es igual o mayor que la cantidad de libros, 
        entonces hacer un filtro que haga un filtro y no me devuelva más libros.
        Mostrar libros que la cantidad sea mayor que la cantidad de préstamos*/
        $libros = Libro::withCount(['prestamo' => function (Builder $query){
            $query->whereNull('fecha_devolucion');
        }])->get()->filter(function($item, $key){
            return $item->cantidad > $item->prestamo_count;
        })->pluck('titulo', 'id');

        // dd($libros);
        return view('libro-prestamo.crear', compact('libros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionLibroPrestamo $request)
    {
        /* Se guarda el libro a través de la relación */
        $libro = Libro::findOrFail($request->libro_id);
        $libro->prestamo()->create([
            'prestado_a' => $request->prestado_a,
            'fecha_prestamo' => $request->fecha_prestamo,
            'usuario_id' => auth()->user()->id
        ]);
        return redirect()->route('libro-prestamo')->with('mensaje', 'El libro se prestó correctamente');
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
