@extends('layouts.main',['activePage' => 'activo', 'titlePage'=>'Detalles del Reporte'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <div class="card-title"> Reporte</div>
                        <p class="card-category">Vista detallada del proyecto {{$report->name}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                           <h5 class="title mt-3">{{$report->name}}</h5>   
                                            <p class="description">
                                                {{$report->created_at}}<br>
                                                
                                               
                                                        {{$report->status->name}}
                                                        <br>
                                                        Proyecto: {{$report->project->name}}
                                            </p>
                                        </div>
                                        </p>
                                        <div class="card-description">
                                            {{$report->descripcion}}
                                        </div>
                                    </div>
                               
                                <div class="card-footer">
                                    <div>
                                    <a href="{{route('reports.index')}}" class="btn btn-sm btn-info mr-3">Volver</a>
                                    <a href="{{route('reports.edit',$report->id)}}" class="btn btn-sm btn-warning mr-3">Editar</a>
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