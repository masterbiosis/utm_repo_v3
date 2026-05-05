<?php

namespace App\Http\Controllers;

use App\Models\Directortesi;
use App\Http\Requests\StoreDirectortesiRequest;
use App\Http\Requests\UpdateDirectortesiRequest;
use App\Mail\MailTicMailable;
use App\Models\Alumno;
use Illuminate\Auth\Middleware\Authorize;

use Illuminate\Support\Facades\DB;

class DirectortesiController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only('index'); //Solamente autentifica este metodo
        //$this->middleware('auth')->only(['index','create']); Solamente los que esten en el arreglo
        //$this->middleware('auth')->except('index'); Igual que el anterior solo que estos son excluidos, es decir, no necesitaran hacer loqin
        $this->middleware('auth'); //Exige la autenticacion para cualquiera de los metodos.
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Directortesi::class);
        $directortesis = Directortesi::all();
        return view('directortesi.index', [
            'directortesis' => $directortesis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Directortesi::class);
        return view('directortesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectortesiRequest $request)
    {
        $directortesi = DirectorTesi::create(request()->all());
        //session()->flash('success',"El Director de Tesis fue dado de alta exitosamente.");
        return redirect()->route('email.usuarioDirectortesis', ['directortesi' => $directortesi]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Directortesi $directortesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directortesi $directortesi)
    {
        return view('directortesi.edit', [
            'directortesi' => $directortesi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectortesiRequest $request, Directortesi $directortesi)
    {
        $directortesi->update(request()->all());
        session()->flash('success', "EL director de Tesis fue modificado exitosamente.");
        return redirect()->route('directortesis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directortesi $directortesi)
    {
        // var_dump($directortesi->email);
        // dd();
        $userEmail = DB::table('users')->where('email',$directortesi->email)->delete();
        $directortesi->delete();
        //dd($userEmail);


        session()->flash('success', "El director  {$directortesi->nombre}, fue borrado exitosamente.");
        return redirect()->route('directortesis.index');
    }

    public function alumnosAsignados(Directortesi $directortesi)
    {
        $alumnos = Alumno::where('directortesi_id', $directortesi->id)->get();
        //$alumnos = Alumno::where('directortesi_id',Auth::user()->name)->get();

        return view('directortesi.asignados', [
            'alumnos' => $alumnos,
            'directortesi' => $directortesi
        ]);
    }
}
