@extends('layouts.main', ['activePage' => 'tareass', 'titlePage' => __('Editar Reporte')])

@section('template_title')
    Create Project
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('reports.update', $report->id)}}"  class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Reporte</h4>
                 <p class="card-category">Editar datos</p>
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
                      <input class="form-control" name="name"  type="text" value="{{$report->name}}"autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="descripcion"  type="text" value="{{$report->descripcion}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                    </div>  
                    <div class="row">
                      <label for="project_id" class="col-sm-2 col-form-label">Proyecto</label>
                      <div class="col-sm-7">
                      <select class="form-control" name="project_id" autofocus>
                        @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
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
              </div>
                <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{route('reports.index')}}"><button type="button" class="btn btn-danger btn-primary">Cancelar</button></a>
              </div>
              </div>
              
            </div>
            </div>
          </form>
            </div>
    </div>
</div>
   
@endsection