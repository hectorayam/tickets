@extends('layouts.main', ['activePage' => 'proyectos', 'titlePage' => __('Nuevo Proyecto')])

@section('template_title')
    Create Project
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{route('projects.store')}}"  enctype="multipart/form-data" class="form-horizontal dropzone"  id="demoform">
                @csrf
                <div class="card">
                <div class="card-header card-header-info">
                 <h4 class="card-title">Proyectos</h4>
                 <p class="card-category">Ingresa datos del proyecto</p>
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
                  <label for="name" class="col-sm-2 col-form-label">Nombre de Proyecto</label>
                  <div class="col-sm-7">
                      <input class="form-control" name="name"  type="text" placeholder="Ingrese el nombre" autofocus/>
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                  </div>
                </div>
                <div class="row">
                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="description"  type="text" placeholder="Describa el proyecto a realizar" rows="7"  autofocus></textarea>
                    </div>
                </div>  
                <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Categoria</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="category_id" autofocus>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
              <div class="row">
                <label for="user_id" class="col-sm-2 col-form-label">Lider de proyecto</label>
                <div class="col-sm-7">
                <select class="form-control" name="user_id" autofocus>
                   
                  
                  @foreach ($users as $user)
                  @foreach($user->roles as $role)
                  @if($role->name =='Lider de proyecto')
                  <td><option value="{{$user->id}}">{{$user->name}}</option></td>
                  @endif
                 @endforeach
                 @endforeach
                </select>
                </div>
              </div>
              <div class="row">
               
              </div>
              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Fecha de inicio de proyecto</label>
                <div class="col-sm-7">
                  <input type="date" id="started_at" name="fecha_inicio" class="form-control">
                </div>
              </div>
              
              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Fecha Limite</label>
                <div class="col-sm-7">
                  <input type="date" id="started_at" name="fecha_final" class="form-control">
                </div>
              </div>  
              
              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Presupuesto de mano de obra</label>
                <div class="col-sm-7">
                    <input class="form-control" name="presupuesto_mano"  type="number" min="0" placeholder="Presupuesto estimado de mano de obra" autofocus></textarea>
                </div>
              </div>

              <div class="row">
                <label for="" class="col-sm-2 col-form-label">Presupuesto de materiales</label>
                <div class="col-sm-7">
                    <input class="form-control" name="presupuesto_material"  type="number" min="0" placeholder="Presupuesto estimado de materiales" autofocus></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-7">
                  <input type="file" name="image[]" accept="image/*" multiple>
                </div>
              </div>

              </div>
              {{-- <div>
                <h3 class="text-center">Upload Image By Click On Box</h3>
              </div>
            <div class="dz-default dz-message"><span>Drop files here to upload</span></div> --}}
              {{-- @foreach ($users as $user)
              @foreach($user->roles as $role)
              @if($role->name =='Tecnico')
                                             <td><option value="{{$id}}">{{$user->name}}</option></td>
                                             @endif
                                              @endforeach
                                              @endforeach --}}
            
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
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <link rel="stylesheet"type="text/css"href="{{asset('assets/css/dropzone.css')}}">
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.js')}}"></script>
<script>
   $(function() {
     $( "#datepicker" ).datepicker();
   });
   Dropzone.options.myAwesomeDropzone={
   headers:{
    'X-CSRF-TOKEN':"{{csrf_token()}}"
   },
       
   dictDefaultMessage:"Arrastre una imagen al recuadro para subirlo",
    acceptedFiles:"image/*",
   maxFilesize:2,
   maxFiles:4,
  };


  Dropzone.autoDiscover=false;
// Dropzone.options.demoform=false;
let token=$('meta[name="csrf-token"]').attr('content');
$(function(){
// var myDropzone = new Dropzone("div#dropzoneDragArea",{
//     paramName:"file",
   
//     previewsContainer:'div.dropzone-previews',
//     addRemoveLinks:true,
//     autoProcessQueue:false,
//     uploadMultiple:false,
//     parallelUploads:1,
//     maxFiles:1,
//     params:{
//        _token:token
//    },
    // The setting up of the dropzone
    init:function(){
        var myDropzone=this;
        // First change the button to actually tell Dropzone to process the queue.
        this.on('sending',function(file,xhr,formData){
          // Make sure that the form isn't actually being sent.
//
//
});
   event.preventDefault();
   event.stopPropagation();
this.on("success",function(file,response){
});
this.on("queuecomplete",function(){
});
// Listen to the sendingmultiple event.In this case,it's the sendingmultiple event instead
// of the sending event because uploadMultiple is set to true.
this.on("sendingmultiple",function(){
// Gets triggered when the form is actually being sent.
// Hide the success button or the complete form.
});
this.on("successmultiple",function(files,response){
// Gets triggered when the files have successfully been sent.
// Redirect user or notify of success.
});
this.on("errormultiple",function(fils,response){
// Gets triggered when there was arterror sending the files.
// Maybe show form again,and notify user of error
});
}
    });
});
   </script>
@endsection