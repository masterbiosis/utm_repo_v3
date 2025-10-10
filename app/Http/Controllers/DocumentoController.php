<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Http\Requests\StoreDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Models\Alumno;
use App\Models\Asesorempresa;
use App\Models\Directortesi;
use App\Models\Linea;
use App\Models\Programa;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
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
          $documentos=Documento::all();
        return view('documento.index',[
            'documentos'=>$documentos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::all();
        $programas = Programa::all();
        $asesors = Asesorempresa::all();
        $directortesis = Directortesi::all();
        $lineas = Linea::all();
        return view('documento.create', [
            'alumnos' => $alumnos,
            'programas' => $programas,
            'asesors' => $asesors,
            'directortesis' => $directortesis,
            'lineas' => $lineas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentoRequest $request)
    {

        // Crear el documento
        /*$documento = new Documento();
        $documento->titulo;
        $documento->fecha_presentacion ;
        $documento->alumno_id ;
        $documento->programa_id;
        $documento->asesor_id;
        $documento->director_tesi_id;
        $documento->linea_id;
        */
        $documento = Documento::create(request()->all());

        // Manejar la subida del archivo PDF
        if ($request->hasFile('archivo_pdf')) {
            $path = $request->file('archivo_pdf')->store('documentos', 'public');
            $documento->archivo_pdf = $path;
        }

        $documento->save();

        $lineas = $request->input('lineas');
if (!empty($lineas) && is_array($lineas)) {
    foreach ($lineas as $linea_id) {
        if (is_numeric($linea_id) && Linea::where('id', $linea_id)->exists()) {
            $documento->lineas()->attach($linea_id);
        }
    }
}

        session()->flash('success', 'El Documento fue dado de alta exitosamente.');
        return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        $alumnos = Alumno::all();
        $programas = Programa::all();
        $asesors = Asesorempresa::all();
        $directortesis = DirectorTesi::all();
        $lineas = Linea::all();
        return view('documento.edit', [
            'documento' => $documento,
            'alumnos' => $alumnos,
            'programas' => $programas,
            'asesors' => $asesors,
            'directortesis' => $directortesis,
            'lineas' => $lineas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentoRequest $request, Documento $documento)
    {
        // Manejar la subida del archivo PDF
        if ($request->hasFile('archivo_pdf')) {
            // Eliminar el archivo anterior si existe
            if ($documento->archivo_pdf) {
                Storage::disk('public')->delete($documento->archivo_pdf);
            }
            // Guardar el nuevo archivo
            $path = $request->file('archivo_pdf')->store('documentos', 'public');
            $documento->archivo_pdf = $path;
        }

        $documento->save();

        session()->flash('success', 'El Documento fue modificado exitosamente.');
        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        // Eliminar el archivo PDF si existe
        if ($documento->archivo_pdf) {
            Storage::disk('public')->delete($documento->archivo_pdf);
        }

        $documento->delete();
        session()->flash('success', "El documento {$documento->titulo} fue borrado exitosamente.");
        return redirect()->route('documentos.index');
    }
}
