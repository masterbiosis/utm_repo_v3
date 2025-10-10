<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;

class EmpresaController extends Controller
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
        $empresas=Empresa::all();
        return view('empresa.index',[
        'empresas'=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        $empresa=Empresa::create(request()->all());
        session()->flash('success',"La Empresa fue dada de alta exitosamente.");
        return redirect()->route('empresas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit',[
            'empresa'=>$empresa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update(request()->all());
            session()->flash('success',"La empresa fue modificada exitosamente.");
        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        session()->flash('success',"La linea de {$empresa->nombre}, fue borrada exitosamente.");
        return redirect()->route('empresas.index');
    }
}
