@extends('layouts.app')

@section('content')

<div class="container">
        
<form action="{{ url('/roles') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field ()}}

@include('Roles.formRoles', ['Mod'=>'create'])

</form>

@endsection