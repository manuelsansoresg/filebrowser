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
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-2 col-md-4 col-form-label">Año</label>
                        <div class="col-sm-10 col-md-7">
                            <select name="" id="" class="form-control">
                                <option value=""> --Seleccione una opción -- </option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->name }}"> {{ $year->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop