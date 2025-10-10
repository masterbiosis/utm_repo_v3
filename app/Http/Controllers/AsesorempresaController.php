<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsesorempresaRequest;
use App\Http\Requests\UpdateAsesorempresaRequest;
use App\Models\Asesorempresa;
use App\Models\Empresa;

class AsesorempresaController extends Controller
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
        $asesores = Asesorempresa::all();
        return view('asesorempresa.index',[
            'asesores'=>$asesores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('asesorempresa.create',[
            'empresas'=>$empresas
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAsesorempresaRequest $request)
    {
        $asesor = Asesorempresa::create(request()->all());
        session()->flash('success',"El asesor fue dado de alta exitosamente.");
        return redirect()->route('asesorempresas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asesorempresa $asesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asesorempresa $asesorempresa)
    {
        $empresas = Empresa::all();
        return view('asesorempresa.edit',[
            'asesor'=>$asesorempresa,
            'empresas'=>$empresas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAsesorempresaRequest $request, Asesorempresa $asesorempresa)
    {
        $asesorempresa->update(request()->all());
        session()->flash('success',"El asesor: {$asesorempresa->nombre} fue modificado de manera correcta.");
        return redirect()->route('asesorempresas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesorempresa $asesorempresa)
    {
        $asesorempresa->delete();
        session()->flash('success',"Asesor: {$asesorempresa->nombre}, se borro exitosamente.");
        return redirect()->route('asesorempresas.index');
    }
}
