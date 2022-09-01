@extends('layouts.main', ['activePage' => 'tareas', 'titlePage' => __('Nueva Tarea')])

@section('template_title')
    Create Project
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('tasks.store')}}"  class="form-horizontal">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Tareas</h4>
                 <p class="card-category">Ingresa datos de la tarea</p>
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
                  <label for="name"class="col-sm-2 col-form-label">Nombre de la Tarea</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="descripcion"  type="text" placeholder="Describa la tarea a realizar" rows="7"  autofocus></textarea>
                    </div>
                </div>  
               
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Proyecto</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="project_id" autofocus>
                    @forelse($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                    @empty
                    <option>N/A</option>
                    @endforelse
                  </select>
                  
                </div>
                </div>
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Estatus</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="status_id" autofocus>
                    @foreach($status as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                  </select>
                
                </div>
                </div>
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Tecnico</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="user_id" autofocus>
                   
                    @foreach($users as $user)
                    @forelse($user->roles as $role)
                    @if($role->name =='Tecnico')
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                    @empty
                    <option>N/A</option>
                    @endforelse
                    @endforeach
                  </select>
                
                </div>
                </div>
              
                <div class="row">
                  <label for="name"class="col-sm-2 col-form-label">Horas estimadas</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="horas_estimadas"  type="number" min="0" placeholder="Ingrese las horas estimadas" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>

              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Fecha de inicio</label>
                <div class="col-sm-7">
                  <input type="date" id="started_at" name="fecha_inicio_tarea" class="form-control">
                </div>
              </div>
              
              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Fecha Limite</label>
                <div class="col-sm-7">
                  <input type="date" id="started_at" name="fecha_final_tarea" class="form-control">
              </div>

              </div>  
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