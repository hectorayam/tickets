@extends('layouts.main', ['activePage' => 'users', 'titlePage' => __('Perfil de  Usuario')])

@section('template_title')
    Create User
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('perfil.update', $user)}}"  class="form-horizontal"> 
                @csrf
                @method('PUT')
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Informacion de Usuario</h4>
                 <p class="card-category"> datos</p>
                </div>
              <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <div class="row">
                  <label for="name"class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" value="{{auth()->user()->name}}"autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="email"  type="email" value="{{auth()->user()->email}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                    </div>  
                <div class="row">
                  <label for="password"class="col-sm-2 col-form-label">Contraseña</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="password"  type="password" placeholder="Ingrese la contraseña" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="telefono"class="col-sm-2 col-form-label">Telefono</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="telefono"  type="tel"   maxlength="10" placeholder="Ingrese el telefono" value="{{auth()->user()->telefono}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                
              </div>
                <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('home')}}"><button type="button" class="btn btn-danger btn-primary">Cancelar</button></a>
              </div>
              </div>
              
            </div>
            </div>
          </form>
            </div>
    </div>
</div>
   
@endsection

