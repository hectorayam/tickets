@extends('layouts.main', ['activePage' => 'status', 'titlePage' => __('Estatus y Categorias')])

@section('template_title')
    Create User
@endsection

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
                                                   <h5 class="title mt-3"><a  href="{{route('statusr.create')}}"><button type="submit" class="btn bg-color ">Estatus Reportes </button></a>
                                                   </h5>   
                                                    <p class="description">
                                                        
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-header card-header-info">
                                                                                <h4 class="card-title">Estatus</h4>
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
                                                                                          @foreach($statusr as $status)
                                                                                          <tr>
                                                                                              <td>{{$status->name}}</td>
                                                                                              <td class="td-actions text-right">
                                                                                                  <button class="btn btn-warning" type="button">
                                                                                                      <a href="{{route('statusr.edit',$status->id)}}"><i class="material-icons">edit</i></a>
                                                                                                  </button>
                                                                                                  <form action="{{route('statusr.delete',$status->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
                                               <h5 class="title mt-3"> <a  href="{{route('statust.create')}}"><button type="submit" class="btn bg-color">Crear Estatus Tareas</button></a>
                                               </h5>   
                                                <p class="description">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                <div class="card-header card-header-info">
                                                                    <h4 class="card-title">Estatus</h4>
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
                                                                               @foreach($statust as $status)
                                                                              <tr>
                                                                                  <td>{{$status->name}}</td>
                                                                                  <td class="td-actions text-right">
                                                                                      <button class="btn btn-warning" type="button">
                                                                                          <a href="{{route('statust.edit',$status->id)}}"><i class="material-icons">edit</i></a>
                                                                                      </button>
                                                                                      <form action="{{route('statust.delete',$status->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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
                                           <h5 class="title mt-3"><a  href="{{route('category.create')}}"><button type="submit" class="btn bg-color">Crear Categorias Proyectos</button></a>
                                           </h5>   
                                            <p class="description">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-header card-header-info">
                                                                        <h4 class="card-title">Categorias</h4>
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
                                                                                  @foreach($categories as $category)
                                                                                  <tr>
                                                                                      
                                                                                     
                                                                                      <td>{{$category->name}}</td>
                                                                                      <td class="td-actions text-right">
                                                                                          <button class="btn btn-warning" type="button">
                                                                                              <a href="{{route('category.edit',$category->id)}}"><i class="material-icons">edit</i></a>
                                                                                          </button>
                                                                                          <form action="{{route('category.edit',$category->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
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