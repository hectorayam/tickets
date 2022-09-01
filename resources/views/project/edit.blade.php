@extends('layouts.main', ['activePage' => 'editp', 'titlePage' => __('Editar Proyecto')])

@section('template_title')
    Create Project
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('projects.update', $project->id)}}"  class="form-horizontal"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Proyecto</h4>
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
                      <input class="form-control" name="name"  type="text" value="{{$project->name}}"autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                
                <div class="row">
                  <label for="description" class="col-sm-2 col-form-label">Descripcion</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="description"  type="text" value="{{$project->description}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>  

                <div class="row">
                  <label for="description" class="col-sm-2 col-form-label">Fecha de Inicio</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="fecha_inicio"  type="date" value="{{$project->fecha_inicio}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>

                <div class="row">
                  <label for="description" class="col-sm-2 col-form-label">Fecha Limite</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="fecha_final"  type="date" value="{{$project->fecha_final}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>

                <div class="row">
                  <label for="description" class="col-sm-2 col-form-label">Presupuesto de Mano de Obra</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="presupuesto_mano"  type="number" min="0" value="{{$project->presupuesto_mano}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>

                <div class="row">
                  <label for="description" class="col-sm-2 col-form-label">Presupuesto de Material</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="presupuesto_material"  type="number" min="0" value="{{$project->presupuesto_material}}" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="user_id" class="col-sm-2 col-form-label">Lider de proyecto</label>
                  <div class="col-sm-7">
                  <select class="form-control" name="user_id" autofocus>
                     
                    
                    @foreach ($users as $user)
                    @foreach($user->roles as $role)
                    @if($role->name =='Lider de proyecto')
                    <td><option value="{{$user->id}}">{{$user->name}}</option></td>
                    @endif
                   @endforeach
                   @endforeach
                  </select>
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
                <br>
                <div class="row">
                <label for="" class="col-sm-2 col-form-label">Images</label>
                
                  <div class="col-sm-7">
                    <input type="file" name="image[]" accept="image/*" multiple>
                  </div>
               
                </div>
                <div class="row">
                <div class="col-sm-7">
                  @foreach($project->image as $img)
                <img src="/images/{{$img->url}}" class=" border position-relative " width="300" height="175" alt=""> 
                <a href="/project/remove-image/{{$img->id}}" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="material-icons">delete</i></a>
                @endforeach
                </div>
                </div>  
             
              </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href="{{route('projects.index')}}"><button type="button" class="btn btn-danger btn-primary">Cancelar</button></a>
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
<script>
$(function() {
  $( "#datepicker" ).datepicker();
});
</script>
@endsection

