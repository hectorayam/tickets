@extends('layouts.main', ['activePage' => 'propuesta', 'titlePage' => __('Propuesta de proyecto')])

@section('template_title')
    Create Project
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('projects.p')}}"  class="form-horizontal">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Proyectos</h4>
                 <p class="card-category">Ingresa datos del proyecto</p>
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
                  <label for="name" class="col-sm-2 col-form-label">Nombre de Proyecto</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" autofocus />
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="description"  type="text" placeholder="Describa el proyecto a realizar" rows="7"  autofocus></textarea>
                    </div>
                </div>  
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Categoria</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="category_id" autofocus>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
              
              <div class="row">
               
              </div>
              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Fecha de inicio de proyecto</label>
                <div class="col-sm-7">
                  <input type="date" id="started_at" name="fecha_inicio" class="form-control">
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
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   {{-- <script>
   $(function() {
     $( "#datepicker" ).datepicker();
   });
   </script> --}}
@endsection