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
                                          <th>Guardado</th>
                                          <th>Fecha de creacion</th>
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            
                                            
                                          <tr>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->guard_name}}</td>
                                            <td>{{$permission->created_at->toFormattedDateString()}}</td>
                                              <td class="td-actions text-right">
                                                  <button class="btn btn-warning" type="button">
                                                    <a href="{{route('permission.edit',$permission->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                  <form action="{{route('permission.destroy',$permission->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
