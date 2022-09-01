@extends('layouts.main',['activePage' => 'tareass', 'titlePage' => __('Tareas')])

@section('template_title')
    Create Task
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Tareas</h4>
                                <p class="card-category">Reportes realizados</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Descripción</th>
                                          <th>Fecha de Inicio</th>
                                          <th>Organizacion</th>
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                        @foreach ($tasks as $task)
                                        
                                          <tr>
                                            <td>{{$task->id}}</td>
                                            <td>{{$task->name}}</td>
                                            <td>{{Illuminate\Support\Str::of($task->descripcion)->words(10)}}</td>
                                            <td>{{$task->created_at}}</td>
                                            @foreach($task->user  as $user)
                                            @foreach($user->company as $company)
                                            <td>{{$company->name}}</td>
                                            @endforeach
                                             @endforeach
                                              <td class="td-actions text-right">
                                                <a href="{{route('tasks.show',$task->id)}}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                               
                                                  <button class="btn btn-warning" type="button">
                                                      <a href="{{route('tasks.edit',$task->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                  <form action="{{route('tasks.delete',$task->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
