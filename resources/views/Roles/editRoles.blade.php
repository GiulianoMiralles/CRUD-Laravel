@extends('layouts.app')

@section('content')


<div class="container">

<form action="{{ url('/roles/' .$roles->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('Roles.formRoles', ['Mod'=>'edit'])

</form>

@endsection