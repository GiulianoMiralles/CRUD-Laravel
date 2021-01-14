<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empleados;

class Roles extends Model
{
    //
    protected $table="roles";
    public function empleados(){
        return $this->belongsTo(Empleados::class);
    }
}
