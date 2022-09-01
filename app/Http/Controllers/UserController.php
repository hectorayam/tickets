<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTable\DataTables;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{

    public function index()
    {
        // abort_if(Gate::denies('user.index'),403);
        $admin = Auth::user()->company;
        if($admin->isEmpty()){
           
            $users = User::All();
         return view('user.indexadmin',compact('users'));
           
              }
        elseif($admin->isNotEmpty()){
         $users = User::All();
         return view('user.index',compact('users'));
         }
    }


    //Crear un usuario
    public function create()
    {
        abort_if(Gate::denies('user.create'),403);
        $roles = Role::all()->pluck('name','id')->except(1);
        $companies = Company::all();
        return view('user.create',compact('roles','companies'));
    }

    //Guardar un usuario
    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required|max:20',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8|max:10',
           'telefono' => 'required|min:10',
           'horas' => 'required',
           'pago' => 'required'
       ],
       ['name.required' => 'EL campo nombre es obligatorio',
       'name.max' => ' El campo nombre debe ser menor a 10',
       'password.required' => 'El campo contraseña no debe estar vacio',
       'password.min' => 'El campo constraseña debe ser mayor a 8 caracteres',
       'password.max' => 'El campo contraseña no puede ser mayor a 10 caracteres',
       'telefono.required' => 'El campo telefono es obligatorio',
       'telefono.min' => 'El campo telefono debe ser mayor a 10 caracteres'
    ]);
        $user = new User;
        
        
      $user=User::create($request->only('name','email','telefono')
        +[
            'password' => bcrypt($request->input('password')),
            'create_by' => auth()->id(),
            
        ]);
        $user->horas = $request->horas;
        $user->pago = $request->pago;
        $user->total_pago =$user->pago*$user->horas;
        $roles = $request->input('roles',[]);
        $user->company()->attach($request->company_id);
      
        $user->syncRoles($roles);
        $user->save();
    return redirect()->back()->with('succes','Usuario creado correctamente');

    }

    //Mostrar un usuario
    public function show($id)
    {
        abort_if(Gate::denies('user.show'),403);
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    //Editar un usuario
    public function edit(User $user)
    {
        abort_if(Gate::denies('user.edit'),403);
        $roles = Role::all()->pluck('name','id');
        $companies = Company::all()->pluck('name','id');
        $user->load('roles');
        return view('user.edit', compact('user','roles','companies'));
    }

   //Actualizar un usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'telefono' => 'required|min:10',
            'status'=>'required'
        ],
        ['name.required' => 'EL campo nombre es obligatorio',
        'name.max' => ' El campo nombre debe ser menor a 10',
        'password.required' => 'El campo contraseña no debe estar vacio',
        'password.min' => 'El campo constraseña debe ser mayor a 8 caracteres',
        'password.max' => 'El campo contraseña no puede ser mayor a 10 caracteres',
        'telefono.required' => 'El campo telefono es obligatorio',
        'telefono.min' => 'El campo telefono debe ser mayor a 10 caracteres'
     ]);
        $data=$request->only('name','email','telefono','status');

       $password=$request->input('password');
       if($password)
        $data['password']=bcrypt($password);

        $user->update($data);
        $roles = $request->input('roles',[]);
        $user->syncRoles($roles);
        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        $user ->delete();

        return back();
    }



}

