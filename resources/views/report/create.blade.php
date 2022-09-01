@extends('layouts.main', ['activePage' => 'reporte', 'titlePage' => __('Nuevo Reporte')])

@section('template_title')
    Create Report
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('reports.store')}}"  class="form-horizontal">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Reporte</h4>
                 <p class="card-category">Ingresa datos del reporte</p>
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
                  <label for="name"class="col-sm-2 col-form-label">Nombre de Reporte</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="descripcion"  type="text" placeholder="Describa el reporte a realizar" rows="7"  autofocus></textarea>
                    </div>
                </div>  
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Proyecto</label>
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
                    @forelse($status as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                    @empty
                    <option>N/A</option>
                    @endforelse
                  </select>
                
                </div>
                </div>
                {{-- <div class="row">
                  <input name="user_id" value="{{ auth()->user()->id }}">
                </div> --}}
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
