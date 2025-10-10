<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Directortesi;
use App\Models\Alumno;


class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only('index'); //Solamente autentifica este metodo
        //$this->middleware('auth')->only(['index','create']); Solamente los que esten en el arreglo
        //$this->middleware('auth')->except('index'); Igual que el anterior solo que estos son excluidos, es decir, no necesitaran hacer loqin
        $this->middleware('auth');//Exige la autenticacion para cualquiera de los metodos.
    }

    public function asignar(){
        $directortesis = Directortesi::all();
        $alumnos = Alumno::all();
        $directorId = 0;

        return view('admin.asignar',[
            'directortesis'=>$directortesis,
            'alumnos'=>$alumnos,
            'directorId'=>$directorId
        ]);

    }


    public function asignardata(Request $request){
        var_dump($request->directortesi);
        var_dump($request->estudiante);
        //var_dump($request->alumno);
        //$affectedRows = Post::where("id", 3)->update(["title" => "Updated title"]);
        //Alumno::where('id',$request->estudiante)->update(["directortesi_id"=>$request->directortesi]);
        if(count($request->estudiante) > 0){
            foreach($request->estudiante as $estudiante){
              // var_dump($alumno);
               //$alumno->nombre;

               echo $estudiante;
               Alumno::where('id',$estudiante)->update(["directortesi_id"=>$request->directortesi]);
            }
        }
        return redirect()->route('admin.asignar');

        //dd('Se esta procesando la asignacion de alumnos al director de tesis.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
