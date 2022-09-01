@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Sistema Seguimiento Servicios')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-md-9 ml-auto mr-auto mb-3 text-center">

            <h3>{{ __('Sistema de seguimiento de reportes y servicios') }} </h3>
        </div>
                
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card card-login card-hidden mb-3">
                            <div class="card-header card-header-info text-center">
                                <h4 class="card-title"><strong>{{ __('Registro de Usuario') }}</strong></h4>
                            </div>
                            <div class="card-body"> 
                            
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">person</i>
                                    </span>
                                    </div>
                                
                                <input placeholder="Nombre" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                            <div class="bmd-form-group mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                          </span>
                                        </div>
                                
                                <input placeholder="Correo Electronico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                         
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="bmd-form-group mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>                                          
                                        </span>
                                        </div>
                                <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                        </div>
                            <div class="bmd-form-group mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons">lock</i>                                          </span>
                                        </div>
                                <input placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">phone</i>                                          </span>
                                    </div>
                                <input placeholder="Telefono" class="form-control" name="telefono"  type="tel"   maxlength="10" name="Numero de Telefono" autofocus/>
                                  <span id="name-error" class="error text-danger" for="input-name"></span>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                            </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
