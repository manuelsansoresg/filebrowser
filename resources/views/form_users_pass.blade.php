@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Cambiar contraseña</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pass.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="col-12 py-3"></div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-md-4 col-form-label">Contraseña</label>
                                        <div class="col-sm-10 col-md-7">
                                            <input type="text"  name="password"  class="form-control" required>
                                            
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-md-4 col-form-label"></label>
                                        <div class="col-sm-10 col-md-7">
                                            <div class="text-right">
                                                <a href="/home" class="btn btn-primary">Volver</a>
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
