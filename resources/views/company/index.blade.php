@extends('layouts.main',['activePage' => 'activo', 'titlePage' => __('Organizaciones')])



@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Organizaciones</h4>
                                <p class="card-category">Organizaciones Activos </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                          <th>ID</th>
                                          <th>Nombre</th>
                                       
                                          <th>Fecha de creacion</th>
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                        @foreach ($companies as $company)
                                        <tr>
                                            
                                            
                                          <tr>
                                            <td>{{$company->id}}</td>
                                            <td>{{$company->name}}</td>
                                            
                                            <td>{{$company->created_at}}</td>
                                              <td class="td-actions text-right">
                                                  <button class="btn btn-warning" type="button">
                                                    <a href="{{route('company.edit',$company->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                  <form action="{{route('company.destroy',$company->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
