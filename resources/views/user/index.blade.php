@extends('layouts.main',['activePage' => 'users', 'titlePage' => __('Usuarios')])
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
@endsection

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
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">Usuarios dados de alta</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example">
                                      <thead class="text-primary">
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th>Empresa</th>
                                          <th>Rol</th>
                                          <th>Estatus</th>
                                          @can('user.edit','user.destroy')
                                          <th class="text-right">Acciones</th>
                                          @endcan
                                      </thead>  
                                      <tbody>
                                         
                                          @foreach ($users as $user)
                                          @php $compan = Auth::user()->company @endphp
                                            @foreach($user->company as $company)
                                            @foreach($compan as $compan)
                                            @if($company->name == $compan->name)
                                          <tr>
                                              <td>{{$user->id}}</td>
                                              <td>{{$user->name}}</td>
                                              <td>{{$user->email}}</td>
                                              @forelse($user->company as $company)
                                              <td>{{$company->name}}</td>
                                              @empty
                                              <td>Es un cliente</td>
                                               @endforelse
                                              @foreach($user->roles as $role)
                                             <td>{{$role->name}}</td>
                                              @endforeach
                                              @if($user->status == 'Activo')
                                              <td><span class="badge badge-success">{{$user->status}}</span></td> 
                                              @else
                                              <td><span class="badge badge-danger">{{$user->status}}</span></td> 
                                              @endif
                                              <td class="td-actions text-right">
                                                    @can('user.edit')
                                                  <button class="btn btn-warning" type="button">
                                                      <a href="{{route('users.edit',$user->id)}}"><i class="material-icons" >edit</i></a>
                                                  </button>
                                                  @endcan
                                                  
                                                  <form action="{{route('users.delete',$user->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
                                                    @can('user.destroy')
                                                    @csrf 
                                                    @method('DELETE')
                                                  <button class="btn btn-danger" type="submit" >
                                                  <i class="material-icons">close</i>
                                                  </button>
                                                  @endcan
                                               
                                                  </form>
                                              </td>
                                             
                                              
                                          
                                          </tr>
                                        
                                          @endif
                                          @endforeach
                                          @endforeach
                                          @endforeach
                                      </tbody>
                                    </table>
                                    @section('js')
                                   
                                    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                                    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
                                    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
                                    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
                                    <script>
                                    //   $(document).ready(function () {
                                    //     $('#example').DataTable({
                                    //         "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]

                                    //     });
                                    //     });  
                                       
                                        $('#example').DataTable({
                                            responsive: true,
                                            autoWidth: false,
                                            
                                            "language":{
                                                "lengthMenu":"Mostrar   "    +
                                            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value='5'>5</option>
                                                <option value='10'>10</option>
                                                <option value='25'>25</option>
                                                <option value='50'>50</option>
                                                <option value='-1'>Todo</option>
                                            </select>`
                                                + " registros por pagina",
                                                "zeroRecords": "Nada encontrado - disculpa",
                                                "info": "Mostrando la paína _PAGE_ de _PAGES_",
                                                "infoEmpty": "No hay registros",
                                                "infoFiltered": "(filtrado de _MAX_ registos totales",
                                                'search': 'Buscar' ,
                                                'paginate':{
                                                    'next':'Siguiente',
                                                    'previous': 'Anterior'
                                                }
                                            }
                                        });
                                      
                                    </script>
                                    @endsection
                                </div>
                            </div>
                            
                            <div class="card-footer mr-auto">
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
