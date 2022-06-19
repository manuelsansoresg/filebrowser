@extends('adminlte::page')

@section('title', 'Archivos')

@section('content_header')
    <h1>Archivos</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5> Busqueda y descarga de archivos </h5>
                    <form action="">
                        <div class="form-group row mt-3">
                            <label for="" class="col-sm-2 col-md-4 col-form-label">Año</label>
                            <div class="col-sm-10 col-md-7">
                                <select name="year" id="year-file" class="form-control">
                                    <option value=""> --Seleccione una opción -- </option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->name }}"> {{ $year->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="" class="col-sm-2 col-md-4 col-form-label"></label>
                            <div class="col-sm-10 col-md-7">
                                <button type="submit" class="btn btn-primary float-right">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <table id="example" class="display datatable table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Año</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($query != null)
                                        @foreach ($query as $query)
                                            <tr>
                                                <td>
                                                    <a href="{{ $query['file'] }}" download> {{ $query['name'] }} </a>
                                                </td>
                                                <td>
                                                    {{ $query['anio'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if ($query != null)
                                <a href="/admin/archivos/export/execute?year={{ (isset($_GET['year']))? $_GET['year'] : '' }}" class="btn btn-primary float-right mt-3">Exportar archivos</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop