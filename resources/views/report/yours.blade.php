@extends('layouts.main',['activePage' => 'activo', 'titlePage' => __('Tus Reportes')])



@section('content')
<div class="content">
    <div class="container-fluid">
        
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-user">
                                            <div class="card-body">
                                                <p class="card-text">
                                                <div class="author">

                                                    <p class="description">
                                                        
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-header card-header-info">
                                                                                <h4 class="card-title">Creados</h4>
                                                                                <p class="card-category"></p>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                      <thead class="text-primary">
                                                                                          <th>Nombre</th>
                                                                                          <th class="text-right">Acciones</th>
                                                                                      </thead>  
                                                                                      <tbody>
                                                                                        @foreach($create as $create)
                                                                                          <tr>
                                                                                              <td>{{$create->name}}</td>
                                                                                              <td class="td-actions text-right">
                                                                                                  <button class="btn btn-warning" type="button">
                                                                                                      <a href=""><i class="material-icons">edit</i></a>
                                                                                                  </button>
                                                                                                  <form action="" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
                                                          
                                                    </p>
                                                </div>
                                                </p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                           
                                            <p class="description">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-header card-header-info">
                                                                        <h4 class="card-title">Asignados </h4>
                                                                        <p class="card-category"></p>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                              <thead class="text-primary">
                                                                                  
                                                                                  <th>Nombre</th>
                                                                                  
                                                                            
                                                                                  <th class="text-right">Acciones</th>
                                                                              </thead>  
                                                                              <tbody>
                                                                                  
                                                                                  <tr>
                                                                                      
                                                                                     
                                                                                      <td></td>
                                                                                      <td class="td-actions text-right">
                                                                                          <button class="btn btn-warning" type="button">
                                                                                              <a href=""><i class="material-icons">edit</i></a>
                                                                                          </button>
                                                                                          <form action="" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
                                                                                            @csrf 
                                                                                            @method('DELETE')
                                                                                          <button class="btn btn-danger" type="submit">
                                                                                          <i class="material-icons">close</i>
                                                                                          </button>
                                                                                          </form>
                                                                                      </td>
                                                                                      
                                                                                  </tr>
                                                                                
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
                                               
                                            </p>
                                        </div>
                                        </p>
                                       
                                    </div>
                               
                                
                            
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                
@endsection