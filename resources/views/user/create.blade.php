@extends('layouts.main', ['activePage' => 'create', 'titlePage' => __('Nuevo Usuario')])

@section('template_title')
    Create User
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('users.store')}}"  class="form-horizontal">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Usuario</h4>
                 <p class="card-category">Ingresar datos</p>
                </div>
              <div class="card-body">
                @if(session('succes'))
                <div class="alert alert-success" role="succes">
                  {{session('succes')}}
                </div>
                @endif
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
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" value="{{old('name')}}"autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="email"  type="email" placeholder="Ingrese el email" autofocus/>
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
                      <input class="form-control" name="telefono"  type="tel"   maxlength="10" placeholder="Ingrese el telefono" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Horas</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="horas"  type="number" min="0" placeholder="Ingrese horas de trabajo" autofocus></textarea>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Sueldo por Hora</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="pago"  type="number" min="0" placeholder="Ingrese sueldo por hora" autofocus></textarea>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Rol</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="roles" autofocus >
                    @foreach($roles as $id => $role)
                    <option value="{{$id}}">{{$role}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
                @php $roles = Auth::user()->roles @endphp
                @foreach($roles as $rol)   
                @if($rol->name == 'Super Admin') 
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Organizacion</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="company_id" autofocus>
                    @foreach ($companies as $company)
              
                  <td><option value="{{$company->id}}">{{$company->name}}</option></td>
                
                 @endforeach
                  </select>
                
                </div>
                </div>
                @endif
                @endforeach
              </div>
                <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </div>
              
            </div>
            </div>
          </form>
            </div>
    </div>
</div>
   
@endsection
