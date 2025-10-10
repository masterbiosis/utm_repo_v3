<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Models\Carrera;

class CarreraController extends Controller
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
        $carreras =  Carrera::all();
        return view('carrera.index',[
            'carreras'=> $carreras
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carrera.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarreraRequest $request)
    {
        $carrera = Carrera::create(request()->all());
        session()->flash('success',"La carrera fue dada de alta exitosamente.");
        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('carrera.edit',[
            'carrera'=>$carrera
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarreraRequest $request, Carrera $carrera)
    {
        $carrera->update(request()->all());
        session()->flash('success',"La carrera fue modificada de manera correcta.");
        return redirect()->route('carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        session()->flash('success',"La carrera: {$carrera->nombre}, fue borrada de manera correcta.");
        return redirect()->route('carreras.index');
    }
}
