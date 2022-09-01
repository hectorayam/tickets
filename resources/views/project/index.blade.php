@extends('layouts.main',['activePage' => 'activo', 'titlePage' => __('Proyectos')])



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
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Descripcion</th>
                                          <th>Fecha de inicio</th>
                                          <th>Organizacion</th>

                                    
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                        @foreach ($projects as $project)

                                       
                                            
                                          <tr>
                                            <td>{{$project->id}}</td>
                                            <td>{{$project->name}}</td>
                                            <td>{{Illuminate\Support\Str::of($project->description)->words(10)}}</td>
                                            <td>{{$project->fecha_inicio}}</td>
                                            @foreach($project->user  as $user)
                                            @foreach($user->company as $company)
                                            <td>{{$company->name}}</td>
                                            @endforeach
                                            @endforeach


                                              <td class="td-actions text-right">
                                                
                                                 <a href="{{route('projects.show',$project->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Examinar"><i class="material-icons">library_books</i></a>
                                                 <a href="{{route('tasks.create')}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Tareas"><i class="material-icons">task</i></a>
                                                 <a href="{{route('reports.create')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Reportes"><i class="material-icons">flag</i></a>
                                               
                                                  <button class="btn btn-warning" type="button">
                                                    <a href="{{route('projects.edit',$project->id)}}" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">edit</i></a>
                                                  </button>
                                                 
                                                  
                                                  <form action="{{route('projects.delete',$project->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
                                                    @csrf 
                                                    @method('DELETE')
                                                  <button class="btn btn-danger" type="submit">
                                                  <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="Eliminar">close</i>
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
