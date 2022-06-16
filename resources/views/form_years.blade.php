@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Año</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">

                        @if (!isset($year->id))
                        <form action="/admin/anios" method="POST">
                        @else
                        <form action="{{ route('anios.update', $year->id) }}" method="POST">
                        @endif
                            @method('PUT')

                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="col-12 py-3"></div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-md-4 col-form-label">Año</label>
                                        <div class="col-sm-10 col-md-7">
                                            <input type="number" min="1985" max="{{ date('Y')  }}" name="data[name]" value="{{ (isset($year->name))? $year->name : '' }}" class="form-control" required>
                                            
                                            @error('data.name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="year_id" value="{{ (isset($year->id))? $year->id : '' }}">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-md-4 col-form-label"></label>
                                        <div class="col-sm-10 col-md-7">
                                            <div class="text-right">
                                                <a href="/admin/anios" class="btn btn-primary">Volver</a>
                                                <input type="submit" value="Guardar" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                    
            
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
