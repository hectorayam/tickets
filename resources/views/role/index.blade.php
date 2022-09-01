@extends('layouts.main',['activePage' => 'activo', 'titlePage' => __('Roles')])



@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Roles</h4>
                                <p class="card-category">Roles Activos </p>
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
                                        @foreach ($roles as $role)
                                        <tr>
                                            
                                            
                                          <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->guard_name}}</td>
                                            <td>{{$role->created_at}}</td>
                                              <td class="td-actions text-right">
                                                  <button class="btn btn-warning" type="button">
                                                    <a href="{{route('role.edit',$role->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                  <form action="{{route('role.destroy',$role->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
