<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only('index'); //Solamente autentifica este metodo
        //$this->middleware('auth')->only(['index','create']); Solamente los que esten en el arreglo
        //$this->middleware('auth')->except('index'); Igual que el anterior solo que estos son excluidos, es decir, no necesitaran hacer loqin
        $this->middleware('auth');//Exige la autenticacion para cualquiera de los metodos.
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos=Alumno::all();
        return view('alumno.index',[
        'alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno=Alumno::create(request()->all());
        session()->flash('success',"El Alumno fue dado de alta exitosamente.");
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumno.edit',[
            'alumno'=>$alumno
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
         $alumno->update(request()->all());
            session()->flash('success',"El alumno fue modificado exitosamente.");
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash('success',"El Alumno {$alumno->nombre}, fue borrado exitosamente.");
        return redirect()->route('alumnos.index');
    }
}
