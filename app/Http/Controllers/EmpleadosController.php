<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datos['Empleados']=Empleados:: orderBy('id' , 'desc') -> paginate(5);

        $datos['Empleados']=Empleados::select('empleados') -> join('roles', 'roles.id' , '=', 'empleados.roles_id') 
        -> select('empleados.id', 'empleados.name', 'empleados.surname', 'empleados.email', 'empleados.dni', 'empleados.address', 'empleados.phone', 'empleados.photo', 'roles.name as rol') -> get();
        
        return view('empleados.index', $datos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Roles::all();
    

        return view('empleados.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $inputs=[
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'roles_id' => 'required|string|max:100',
            'email' => 'required|email',
            'dni' => 'required|integer',
            'address' => 'required|string|max:100',
            'phone' => 'required|integer',
            'photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $inputs, $Mensaje);

        //$datosEmpleado=$request->all();

        $datosEmpleado=$request->except('_token');

        if ($request->hasFile('photo')){

            $datosEmpleado['photo']=$request->file('photo')->store('uploads', 'public');
        }

        Empleados::insert($datosEmpleado);

        //return response()->json($datosEmpleado);
        return redirect('empleados')->with('Mensaje', '¡Empleado agregado con éxito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Empleado= Empleados::findOrFail($id);

        $roles = Roles::all();

        $rol= Roles::where('id', $Empleado->roles_id) -> first();

        return view('empleados.edit', compact('Empleado', 'rol', 'roles'));
    }

    public function viewMore($id)
    {
        //
        $Empleado= Empleados::where('id', '=', $id) -> first();

        $rol= Roles::where('id', $Empleado->roles_id) -> first();

        //dd($rol);

        return view('empleados.viewMore', compact('Empleado', 'rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $inputs=[
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'roles_id' => 'required|string|max:100',
            'email' => 'required|email',
            'dni' => 'required|integer',
            'address' => 'required|string|max:100',
            'phone' => 'required|integer',
        ];

        if ($request->hasFile('photo')){
            $inputs+=['photo' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $inputs, $Mensaje);

        $datosEmpleado=$request->except(['_token','_method']);

        if ($request->hasFile('photo')){

            $Empleado= Empleados::findOrFail($id);

            
            Storage::delete('public/'.$Empleado->photo);
            

            $datosEmpleado['photo']=$request->file('photo')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($datosEmpleado);

        //$Empleado= Empleados::findOrFail($id);
        //return view('empleados.edit', compact('Empleado'));

        return redirect('empleados')->with('Mensaje', '¡Empleado modificado con éxito!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $Empleado= Empleados::findOrFail($id);

        if(Storage::delete('public/'.$Empleado->photo)){ //borro la foto de la carpeta storage y el registro abajo
            Empleados::destroy($id);
        }
        //return redirect('empleados');

        return redirect('empleados')->with('Mensaje', '¡Empleado eliminado con éxito!');

    }
}
