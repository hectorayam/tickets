@forelse($role->permissions as  $permission)

<span class="badge badge-info">{{$permission->name}}</span>
@empty

@endforelse
