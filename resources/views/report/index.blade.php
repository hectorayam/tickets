@extends('layouts.main',['activePage' => 'reporte', 'titlePage' => __('Reportes')])

@section('template_title')
    Create User
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
                                <h4 class="card-title">Reportes</h4>
                                <p class="card-category">Reportes realizados</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Descripción</th>
                                          <th>Organizacion</th>
                                    
                                          <th class="text-right">Acciones</th>
                                      </thead>  
                                      <tbody>
                                          @foreach($reports as $report)
                                          <tr>
                                              <td>{{$report->id}}</td>
                                              <td>{{$report->name}}</td>
                                              <td>{{$report->descripcion}}</td>
                                              @foreach($report->user  as $user)
                                            @foreach($user->company as $company)
                                            <td>{{$company->name}}</td>
                                            @endforeach
                                            @endforeach
                                              <td class="td-actions text-right">
                                                <a href="{{route('reports.show',$report->id)}}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                  <button class="btn btn-warning" type="button">
                                                      <a href="{{route('reports.edit',$report->id)}}"><i class="material-icons">edit</i></a>
                                                  </button>
                                                  <form action="{{route('reports.delete',$report->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
