@extends('layouts.app')

@section('content')


<div class="container">

<form action="{{ url('/empleados/' .$Empleado->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('empleados.form', ['Mod'=>'edit'])

</form>

@endsection