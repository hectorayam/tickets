@extends('layouts.main',['activePage' => 'activo', 'titlePage'=>'Detalles del Proyecto'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <div class="card-title"> Proyecto</div>
                        <p class="card-category">Vista detallada del proyecto </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                           <h5 class="title mt-3"></h5>   
                                            <p class="description">
                                                <table class="table table-dark table-striped table-rounder">
                                                    <thead>
                                                        <tr>
                                                          <th >Reportes</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($project->reports as $report)
                                                  <tr>
                                                    <td>
                                                        {{$report->name}}
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="{{route('reports.show',$report->id)}}" class="btn btn-info"><i class="material-icons">library_books</i></a> 
                                                        @empty
                                                        <td>No hay reportes</td>
                                                    </td>
                                                   
                                                    </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                                
                                                @foreach($project->user as $user)
                                               Programador asignado: {{$user->name}}
                                                @endforeach 
                                                <br>
                                           
                                                Creado asignado: {{$project->create->name}}
                                                
                                                 <br>
                                            </p>
                                        </div>
                                        </p>
                                        <div class="card-description">
                                            <ul> 
                                                <li><b>Nombre: </b>{{$project->name}}</li>
                                          
                                                
                                                <li><b>Categoria: </b>{{$project->category->name}}</li>
                                                
                                                <li><b>Descripcion: </b>{{$project->description}}</li>
                                                <li><b>Fecha de Inicio: </b>{{$project->fecha_inicio}}</li>
                                                <li><b>Fecha Limite: </b>{{$project->fecha_final}}</li>
                                                <li><b>Presupuesto de Mano de Obra: </b>{{$project->presupuesto_mano}}</li>
                                                <li><b>Presupuesto de Material: </b>{{$project->presupuesto_material}}</li>


                                                    
                                               
                                                
                                                {{-- <img src="{{asset($project->image->url)}}" alt=""> --}}
                                                {{-- @foreach($project->image as $img)
                                                <img src="{{asset($img->id)}}" alt="">                                               
                                                @endforeach
                                                @isset($project->image)
                                                <img src="{{Storage::url($project->image->url)}}" alt="">
                                                @endisset    
                                            </ul> --}}
                                        </div>
                                    </div>
                               
                                <div class="card-footer">
                                    <div>
                                    <a href="{{route('projects.index')}}" class="btn btn-sm btn-info mr-3">Volver</a>
                                    <a href="{{route('projects.edit',$project->id)}}" class="btn btn-sm btn-warning mr-3">Editar</a>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="author">
                                       <h5 class="title mt-3"></h5>   
                                        <p class="description">
                                            <table class="table table-dark table-striped table-rounder">
                                                <thead>
                                                    <tr>
                                                      <th >Evidencias</th>
                                                    </tr>
                                            </thead>
                                            </table>
                                            <br> 
                                                @foreach($project->image as $img)
                                                    
                                                <img src="/images/{{$img->url}}" class="w-100 border position-relative "alt=""> 
                                                {{-- <a href="/project/remove-image/{{$img->id}}" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">close</i></a> --}}
   
                                            @endforeach
                                           
                                           
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