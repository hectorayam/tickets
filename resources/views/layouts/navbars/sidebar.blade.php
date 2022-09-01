<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route('home')}}" class="simple-text logo-normal">
      {{ __('3S Innovus') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Administración') }}</p>
        </a>
      </li>
      @can('user')
      <li class="nav-item {{ ($activePage == 'create' || $activePage == 'user') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/user.svg') }}"></i>
          <p>{{ __('Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse shown" id="laravelExample">
          <ul class="nav">
            @can('user.create')
            <li class="nav-item{{ $activePage == 'create' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('users.create')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">group_add</i>
                </span>
                <span class="sidebar-normal">{{ __('Crear Usuarios') }} </span>
              </a>
            </li>
            @endcan
            @can('user.index')
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('users.index')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">person</i>
                </span>
                <span class="sidebar-normal"> {{ __('Administrar Usuarios') }} </span>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan
      @can('project.menu')
      <li class="nav-item {{ ($activePage == 'activo' || $activePage == 'proyectos') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample1" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/project.svg') }}"></i>
          <p>{{ __('Proyectos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse bs hidden" id="laravelExample1">
          <ul class="nav">
            @can('project.create')
            <li class="nav-item{{ $activePage == 'proyectos' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('projects.create')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">next_week</i>
                </span>
                <span class="sidebar-normal">{{ __('Crear Proyecto') }} </span>
              </a>
            </li>
            @endcan
            @can('project.index')
            <li class="nav-item{{ $activePage == 'editp' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('projects.index')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">folders</i>
                </span>
                <span class="sidebar-normal"> {{ __('Administrar proyectos') }} </span>
              </a>
            </li>
            @endcan
            <li class="nav-item{{ $activePage == 'propuesta' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('projects.prop')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">folders</i>
                </span>
                <span class="sidebar-normal"> {{ __('Proyectos de clientes') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endcan

      @can('project.menu')
      <li class="nav-item {{ ($activePage == 'activo' || $activePage == 'proyectos') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample7" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/project.svg') }}"></i>
          <p>{{ __('Propuesta de proyecto') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse bs hidden" id="laravelExample7">
          <ul class="nav">
          @can('cotizar')
            <li class="nav-item{{ $activePage == 'create' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('projects.client')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">next_week</i>
                </span>
                <span class="sidebar-normal">{{ __('Cotizar proyecto') }} </span>
              </a>
            </li>
           @endcan
          </ul>
        </div>
      </li>
      @endcan
      
      @can('task.menu')
      <li class="nav-item {{ ($activePage == 'create' || $activePage == 'user') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/list-task.svg') }}"></i>
          <p>{{ __('Tareas') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse bs hidden" id="laravelExample2">
          <ul class="nav">
            @can('task.create')
            <li class="nav-item{{ $activePage == 'tareas' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('tasks.create')}}">
                <i class="material-icons">book</i>
                <p>{{ __('Crear Tareas') }}</p>
              </a>
            </li>
            @endcan
            @can('task.index')
            <li class="nav-item{{ $activePage == 'tareass' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('tasks.index')}}">
                <i class="material-icons">import_contacts</i>
                  <p>{{ __('Administrar Tareas') }}</p>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan
      @can('report.menu')
      <li class="nav-item {{ ($activePage == 'create' || $activePage == 'user') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample3" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/flag.svg') }}"></i>
          <p>{{ __('Reportes') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse bs hidden" id="laravelExample3">
          <ul class="nav">
            @can('report.create')
            <li class="nav-item{{ $activePage == 'reporte' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('reports.create')}}">
                <i class="material-icons">note_add</i>
                <p>{{ __('Crear Reportes') }}</p>
              </a>
            </li>
            @endcan
            @can('report.index')
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('reports.index')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">language</i>
                </span>
                <span class="sidebar-normal"> {{ __('Administrar Reportes') }} </span>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan
        
            @can('status.index','permission.index')
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'status' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('menu')}}">
                  <i ><img style="width:25px" src="{{ asset('/img/Icons/activity.svg') }}"></i>
                  <p>{{ __('Estatus y Categorias') }}</p>
                </a>
              </li>
              
      <li class="nav-item {{ ($activePage == 'users' || $activePage == 'reporte') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample5" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('/img/Icons/key-fill.svg') }}"></i>
          <p>{{ __('Permisos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse bs hidden" id="laravelExample5">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'reporte' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('permission.create')}}">
                <i class="material-icons">note_add</i>
                <p>{{ __('Crear permisos') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('permission.index')}}">
                <span class="sidebar-mini"> 
                  <i class="material-icons">language</i>
                </span>
                <span class="sidebar-normal"> {{ __('Administrar permisos') }} </span>
              </a>
            </li>
            
          </ul>
        </div>
    </li>
    {{-- @can('rol.index') --}}
    <li class="nav-item {{ ($activePage == 'users' || $activePage == 'reporte') ? ' active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#laravelExample6" aria-expanded="false">
        <i><img style="width:25px" src="{{ asset('/img/Icons/person-rolodex.svg') }}"></i>
        <p>{{ __('Roles') }}
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse bs hidden" id="laravelExample6">
        <ul class="nav">
          <li class="nav-item{{ $activePage == 'reporte' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('role.create')}}">
              <i class="material-icons">note_add</i>
              <p>{{ __('Crear Roles') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('role.index')}}">
              <span class="sidebar-mini"> 
                <i class="material-icons">language</i>
              </span>
              <span class="sidebar-normal"> {{ __('Administrar Roles') }} </span>
            </a>
          </li>
          
        </ul>
      </div>
  </li>
  <li class="nav-item {{ ($activePage == 'users' || $activePage == 'reporte') ? ' active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#laravelExample9" aria-expanded="false">
      <i><img style="width:25px" src="{{ asset('/img/Icons/building.svg') }}"></i>
      <p>{{ __('Organizacion') }}
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse bs hidden" id="laravelExample9">
      <ul class="nav">
        <li class="nav-item{{ $activePage == 'reporte' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('company.create')}}">
            <i class="material-icons">note_add</i>
            <p>{{ __('Crear Organizacion') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('company.index')}}">
            <span class="sidebar-mini"> 
              <i class="material-icons">language</i>
            </span>
            <span class="sidebar-normal"> {{ __('Administrar Organizaciones') }} </span>
          </a>
        </li>
        
      </ul>
    </div>
</li>
  @endcan
    </ul>
  </div>
</div>
