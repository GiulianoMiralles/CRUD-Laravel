<?php

namespace App\Http\Controllers;

use App\User;
use App\Empleados;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class apiController extends Controller
{
    //
    public function users()
    {
        $users = User::select('id', 'name', 'email', 'created_at') -> get();
        
        return ($users);
    }


    public function user($id)
    {
        $user = User::select('id', 'name', 'email', 'created_at') -> where('id', '=', $id) -> first();
        
        return ($user);
    }


    public function empleados()
    {

        $empleados  = Empleados::select('empleados') -> join('roles', 'roles.id' , '=', 'empleados.roles_id') 
        -> select('empleados.id', 'empleados.name', 'empleados.surname', 'empleados.email', 'empleados.dni', 'empleados.address', 'empleados.phone', 'empleados.photo', 'roles.name as rol') 
        -> get();
        
        return ($empleados);
    }

    public function empleado($id)
    {
        $empleado  = Empleados::select('empleados') -> join('roles', 'roles.id' , '=', 'empleados.roles_id') 
        -> select('empleados.id', 'empleados.name', 'empleados.surname', 'empleados.email', 'empleados.dni', 'empleados.address', 'empleados.phone', 'empleados.photo', 'roles.name as rol') 
        -> where('empleados.id', '=', $id) -> first();

        
        return ($empleado);
    }

    public function roles()
    {
        $roles = Roles::select('id', 'name', 'description') -> get();
        
        return ($roles);
    }

    public function rol($id)
    {
        $rol = Roles::select('id', 'name', 'description') -> where('id', '=', $id) -> first();
        
        return ($rol);
    }
}
