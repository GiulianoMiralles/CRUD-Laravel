<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos['Roles']=Roles::paginate(5);

        return view('Roles.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Roles.createRoles');
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
            'description' => 'required|string|max:255',
        ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $inputs, $Mensaje);

        $datosRoles=$request->except('_token');
        Roles::insert($datosRoles);

        return redirect('roles')->with('Mensaje', '¡Rol creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $roles= Roles::findOrFail($id);

        return view('Roles.editRoles', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles, $id)
    {
        //
        $inputs=[
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $datosRoles=$request->except(['_token','_method']);

        $this->validate($request, $inputs, $Mensaje);

        Roles::where('id', '=', $id)->update($datosRoles);

        return redirect('roles')->with('Mensaje', '¡Rol modificado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $roles= Roles::findOrFail($id);

        Roles::destroy($id);

        return redirect('roles')->with('Mensaje', '¡Rol eliminado con éxito!');
    }
}
