@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Listado de años</h1>
@stop

@section('content')
    @hasrole('Administrador')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
               
                <div class="card">
                    <div class="card-body">
                        <p>
                            <a href="/admin/anios/create" class="btn btn-primary float-right"> Crear </a>
                        </p>
                        <br>
                        <br>
                        <table id="example" class="display datatable table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $query)
                                    <tr>
                                        <td>{{ $query->name }}</td>
                                        <td>
                                           <div class="text-center">
                                                <form action="{{route('anios.destroy',[$query->id])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="/admin/anios/{{ $query->id }}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit text-white"></i></a>
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
