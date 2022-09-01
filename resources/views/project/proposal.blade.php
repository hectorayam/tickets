@extends('layouts.main',['activePage' => 'activo', 'titlePage' => __('Propuestas de Clientes')])



@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Proyectos</h4>
                                <p class="card-category">Proyectos Activos </p>
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
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                        
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Descripcion</th>
                                          <th>Fecha de inicio</th>

                                    
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                        
                                        
                                        @foreach ($projects as $project)
                                       
                                       
                                        {{-- @if(substr_compare($project->name,'propuesta',-9,9,true)==0) --}}
                                   
                                            
                                          <tr>
                                            <td>{{$project->id}}</td>
                                            <td>{{$project->name}}</td>
                                            <td>{{Illuminate\Support\Str::of($project->description)->words(10)}}</td>
                                            <td>{{$project->fecha_inicio}}</td>



                                              <td class="td-actions text-right">
                                                
                                                 <a href="{{route('projects.show',$project->id)}}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                               
                                                  <button class="btn btn-warning" type="button">
                                                    <a href="{{route('projects.edit',$project->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                 
                                                  
                                                  <form action="{{route('projects.delete',$project->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
                                                    @csrf 
                                                    @method('DELETE')
                                                  <button class="btn btn-danger" type="submit">
                                                  <i class="material-icons">close</i>
                                                  </button>
                                                  </form>
                                              </td>
                                        
                                         
                                          </tr>
                                       
                                      
                                          @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="card-footer mr-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
