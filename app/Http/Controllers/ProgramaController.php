<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramaRequest;
use App\Http\Requests\UpdateProgramaRequest;
use App\Models\Programa;
use App\Models\Carrera;

class ProgramaController extends Controller
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
        $programas = Programa::all();
        return view('programa.index',[
            'programas'=>$programas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('programa.create',[
            'carreras'=>$carreras
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramaRequest $request)
    {
        $programa = Programa::create(request()->all());
        session()->flash('success',"El programa fue dado de alta exitosamente.");
        return redirect()->route('programas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        $carreras = Carrera::all();
        return view('programa.edit',[
            'programa'=>$programa,
            'carreras'=>$carreras
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramaRequest $request, Programa $programa)
    {
        $programa->update(request()->all());
        session()->flash('success',"El programa hasido modificado de manera correcta.");
        return redirect()->route('programas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();
        session()->flash('success',"La carrera: {$programa->nombre}, fue borrada de manera correcta.");
        return redirect()->route('programas.index');
    }
}
