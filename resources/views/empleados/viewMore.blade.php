@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<div class="container">

<form action="{{ url('/empleados/' .$Empleado->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

<link href="{{ asset('css/form.css') }}" rel="stylesheet">

<div class=" d-flex justify-content-center aling-item-center">
    <div class="row">
        <div class="col-md-4">
        <div class="card" style="width: 40rem;">
            <div id="cardBody" class="card-body">
                <h5  class="card-title text-center"> Empleado: {{ $Empleado->name . " " . $Empleado->surname}}</h5>
                <hr style="background-color: #dee2e6">

                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" disabled class="form-control"  value="{{ $Empleado->name . " " . $Empleado->surname}}">
                </div>

                </br>

                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-envelope-square"></i>
                    </div>
                    <input type="email" disabled class="form-control"  value="{{$Empleado->email}}">
                </div>

                </br>

                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <input type="text" disabled class="form-control"  value="{{$Empleado->dni}}">
                </div>
                
                </br>

                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-home"></i>
                    </div>
                    <input type="text" disabled class="form-control"  value="{{$Empleado->address}}">
                </div>
                
                </br> 


                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <input type="text" disabled class="form-control" value="{{ $Empleado->phone}}">
                </div>
                
                </br>

                <div class="input-group">
                    <div class="input-group-text bg-white">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <input type="text" disabled class="form-control" value="{{$rol->name}}">
                </div>

                </br>
                                
                <div class="form-group">
                    <label for="Foto" class="control-label"> {{'Foto'}} </label>
                    <div class="text-center">
                        @if (isset($Empleado->photo))
                            </br>
                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$Empleado->photo }}" alt="" width="200">
                            </br>
                        @endif

                        </br>
                    </div>

                    <input class="form-control {{$errors->has('photo')?'is-invalid':''}}" type="file" name="photo" id="photo" value="">
                </div>

                <div class="text-center">
                    <a class="btn btn-primary" href="{{ url('empleados') }}"> ← Vovler al Inicio </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>








</form>

@endsection