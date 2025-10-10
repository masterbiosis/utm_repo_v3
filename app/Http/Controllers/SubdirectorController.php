<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubdirectorRequest;
use App\Http\Requests\UpdateSubdirectorRequest;
use App\Models\Subdirector;
use App\Models\Carrera;

class SubdirectorController extends Controller
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
        $subdirectores = Subdirector::all();
        return view('subdirector.index',[
            'subdirectors'=>$subdirectores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('subdirector.create',[
            'carreras'=>$carreras
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubdirectorRequest $request)
    {
        $director = Subdirector::create(request()->all());
        session()->flash('success',"El subdirector de carrera fue dado de alta exitosamente.");
        return redirect()->route('subdirectors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subdirector $subdirector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subdirector $subdirector)
    {
        $carreras = Carrera::all();
        return view('subdirector.edit',[
            'subdirector'=>$subdirector,
            'carreras'=>$carreras
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubdirectorRequest $request, Subdirector $subdirector)
    {
        $subdirector->update(request()->all());
        session()->flash('success',"El subdirector de carrera fue modificada de manera correcta.");
        return redirect()->route('subdirectors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subdirector $subdirector)
    {
        $subdirector->delete();
        session()->flash('success',"El director: {$subdirector->nombre} {$subdirector->app} {$subdirector->apm} fue borrada de manera correcta.");
        return redirect()->route('subdirectors.index');
    }
}
