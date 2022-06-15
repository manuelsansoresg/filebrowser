@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Listado</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
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
                                            <a href=""><i class="fas fa-edit text-success"></i></a>
                                            <a href=""><i class="fas fa-key text-secondary"></i></a>
                                            <a href=""><i class="fas fa-trash text-danger"></i></a>
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
@stop
