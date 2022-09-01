@extends('layouts.main',['activePage' => 'tareass', 'titlePage'=>'Detalles del Proyecto'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <div class="card-title"> Proyecto</div>
                        <p class="card-category">Vista detallada del proyecto {{$task->name}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                           <h5 class="title mt-3">{{$task->name}}</h5>   
                                            <p class="description">
                                                {{$task->created_at}}<br>
                                                {{$task->tipo}}
                                            </p>
                                        </div>
                                        </p>
                                        <div class="card-description">
                                            {{$task->descripcion}}
                                        </div>
                                    </div>
                               
                                <div class="card-footer">
                                    <div>
                                    <a href="{{route('tasks.index')}}" class="btn btn-sm btn-info mr-3">Volver</a>
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-sm btn-warning mr-3">Editar</a>
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