<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Roles;

class Empleados extends Model
{
    //
    protected $table="empleados";
    public function roles(){
        return $this->hasMany(Roles::class);
    }
}
