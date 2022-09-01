@extends('layouts.main', ['activePage' => 'proyectos', 'titlePage' => __('Nuevo Rol')])

@section('template_title')
    Create Permission
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('role.store')}}"  class="form-horizontal">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Roles</h4>
                 <p class="card-category">Ingresa datos</p>
                </div>
              <div class="card-body">
                @if(session('succes'))
                <div class="alert alert-success" role="succes">
                  {{session('succes')}}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Nombre del Rol</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
               <div class="row">
                 <label for="name"  class="col-sm-2 col-form-label">Permisos</label>
                 <div class="col-sm-7">
                  <div class="form-group">
                     <div class="tab-content">
                      <div class="tab-pane active" id="profile">
                        <table class="table">
                          <tbody>
                            @foreach($permissions as $id => $permission)
                             <tr>
                               <td>
                                <div class="form-check">
                                   <label class="form-check-label">
                                     <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}">
                                     <span class="form-check-sign">
                                       <span class="check"></span>
                                      </span>
                                   </label>
                                </div>
                               </td>    
                               <td>
                                 {{$permission}}
                               </td>
                             </tr>
                             @endforeach
                          </tbody>
                        </table>
                      </div>
                     </div>
                  </div>
                 </div>
               </div>
              </div>
                <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </div>
              
            </div>
            </div>
          </form>
            </div>
    </div>
   </div>
@endsection