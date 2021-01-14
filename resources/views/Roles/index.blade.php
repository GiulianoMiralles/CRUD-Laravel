@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<div class="container">
    
    @if(Session::has('Mensaje'))

    <div class="alert alert-success text-center" role="alert">  
        {{Session::get('Mensaje')}}
    </div>

@endif

    <div class="p-4">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('roles/create') }}" class="btn btn-success"> Nuevo rol </a>
            </div>
    <br/>
    <br/>

        <div class="col-md-5">
            <form class="d-flex justify-content-center aling-item-center">
                <div class="form-group d-flex justify-content-center aling-item-center" style="width: 100%;">
                    <div class="input-group">
                        <input type="text" id="search"  data-table="order-table" class="form-control table-bordered" placeholder="Ingrese el nombre del empleado que desea buscar">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <table id="myTable" class="table table-bordered table-hover table-dark table-striped order-table">

        <thead>
            <tr>
                <th class="text-center" >#</th>
                <th class="text-center" >Nombre</th>
                <th class="text-center" >Descripcion</th>
                <th class="text-center" >Acciones</th>
            </tr>
        </thead>

        <tbody> 
            @foreach ($Roles as $Rol)
                <tr>
                    <td class="text-center align-middle" >{{$loop->iteration}}</td>
                    <td class="text-center align-middle" >{{ $Rol->name }}</td>
                    <td class="text-center align-middle" > {{ $Rol->description }}</td>
                    <td class="text-center align-middle"> 
                        <a class="btn btn-primary" href="{{ url('/roles/'.$Rol->id.'/edit') }}">
                            Editar
                        </a>

                        <form method="post" action="{{ url('/roles/'.$Rol->id)}}" style="display:inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" onclick="return confirm ('¿Esta seguro de que desea eliminar este rol?');"> Eliminar </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="row justify-content-center align-items-center">
            {{ $Roles->links() }}
    </div>
    
</div>

<script type="text/javascript">
    (function(document) {
        'use strict';
        var LightTableFilter = (function(Arr) {
        var _input;
        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
                Arr.forEach.call(tbody.rows, _filter);
            });
            });
        }
        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }
        return {
            init: function() {
            var inputs = document.getElementsByClassName('table-bordered');
            Arr.forEach.call(inputs, function(input) {
                input.oninput = _onInputEvent;
            });
            }
        };
        })(Array.prototype);
        document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
        });
    })(document);
</script>



@endsection