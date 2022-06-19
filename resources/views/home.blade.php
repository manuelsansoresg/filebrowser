@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')

    @hasrole('Administrador')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>
                            <a href="/admin/users/create" class="btn btn-primary float-right"> Crear </a>
                        </p>
                        <br>
                        <br>
                        <table id="example" class="display datatable table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td> {{ $user->email }} </td>
                                        <td>
                                           <div class="text-center">
                                            <form action="{{route('users.destroy',[$user->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit text-white"></i></a>
                                                <a href="/admin/users/pass/{{ $user->id }}/edit" class="btn btn-sm btn-secondary"><i class="fas fa-key text-white"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash text-white"></i></button>
                                            </form>
                                                
                                           </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No cuenta con permisos de administrador</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    
@stop
