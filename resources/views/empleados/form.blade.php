<link href="{{ asset('css/form.css') }}" rel="stylesheet">

<div class=" d-flex justify-content-center aling-item-center">
    <div class="row">
        <div class="col-md-4">
        <div class="card" style="width: 50rem;">
            <div id="cardBody" class="card-body">
                <h5  class="card-title text-center">{{ $Mod=='create' ? 'Agregar un nuevo empleado' : 'Editar empleado' }} {{ isset($Empleado->name) ? $Empleado->name:old('name')}} {{ isset($Empleado->surname) ? $Empleado->surname:old('surname')}}</h5>
                <hr style="background-color: #dee2e6">
                
                <div class="form-group">
                    <label for="Nombre" class="control-label"> {{'Nombre'}} </label>
                    <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" id="name" value="{{ isset($Empleado->name) ? $Empleado->name:old('name')}}">
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Apellido" class="control-label"> {{'Apellido'}} </label>
                    <input type="text" class="form-control {{$errors->has('surname')?'is-invalid':''}}" name="surname" id="surname" value="{{ isset($Empleado->surname) ? $Empleado->surname:old('surname')}}">
                    {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Rol" class="control-label"> {{'Rol'}} </label>
                    <select name="roles_id" id="roles_id" class="form-control">
                        @if( $Mod=='create' ))
                            @foreach($roles as $rol)
                                    <option value="{{ $rol->id}}"> {{ $rol->name}} </option>
                            @endforeach
                        @else 
                            @foreach($roles as $rols)
                                <option value="{{ $rols->id}}" {{ $rol->name == $rols->name ? 'selected' : '' }}> {{ $rols->name}} </option>
                            @endforeach
                        @endif
                    </select>

                </div>

                <div class="form-group">
                    <label for="Email" class="control-label"> {{'Email'}} </label>
                    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="email" value="{{ isset($Empleado->email) ? $Empleado->email:old('email')}}">
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    <label for="Documento" class="control-label"> {{'Documento'}} </label>
                    <input type="number" class="form-control {{$errors->has('dni')?'is-invalid':''}}" name="dni" id="dni" value="{{ isset($Empleado->dni) ? $Empleado->dni:old('dni')}}">
                    {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    <label for="Direccion" class="control-label"> {{'Direccion'}} </label>
                    <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" id="address" value="{{ isset($Empleado->address) ? $Empleado->address:old('address')}}">
                    {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    <label for="Telefono" class="control-label"> {{'Telefono'}} </label>
                    <input type="number" class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" id="phone" value="{{ isset($Empleado->phone) ? $Empleado->phone:old('phone')}}">
                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
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
                    {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="text-center">
                    <a class="btn btn-primary" href="{{ url('empleados') }}"> ← Vovler al Inicio </a>
                    <input type="submit" class="btn btn-success" value="{{ $Mod=='create' ? 'Agregar' : 'Editar' }}">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- Google Maps JavaScript library -->
<script
    src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCvsgezOM3xFkiKYKh_t1xgEqxKvZWnJUs">
</script>


<script>
    let address = 'address';

    $(document).ready(function () {
        let autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('address')), {
            types: ['geocode'],
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            let near_place = autocomplete.getPlace();
        });
    });
</script>




