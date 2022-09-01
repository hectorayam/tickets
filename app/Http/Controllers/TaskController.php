<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\StatusTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('task.index'),403);
        $admin = Auth::user()->company;
        if($admin->isEmpty()){
            $tasks = Task::All();
            return view('task.index',compact('tasks'));
           }
            
           elseif($admin->isNotEmpty()){
                    $company = Auth::user()->company;
                    foreach($company as $company){
                    $i =$company->name;
                                                }
        $tasks = Task::join('users','users.id','=','tasks.create_by')
                        ->join('company_user','users.id','=','company_user.user_id')
                        ->join('companies','companies.id','=','company_user.company_id')
                        ->where('companies.name','=',$i)
                        ->select('tasks.*')
                        ->get();


        return view('task.index',compact('tasks'));
    }
    }

    //Crear una tarea
    public function create()
    {
        abort_if(Gate::denies('task.create'),403);
        $projects= Project::all();
        $status = StatusTask::all();
        $users = User::all();
        return view('task.create',compact('projects','status','users'));
    }

    //Guardar una tarea
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'fecha_inicio_tarea' => 'required',
            'fecha_final_tarea' => 'required',
            'horas_estimadas' => 'required',
            'project_id'=> 'required',
            'status_id' => 'required',
           
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',
            'descripcion.required' => 'El campo descripcion no puede estar vacio',
            'fecha_inicio_tarea.required' => 'El campo fecha de inicio de tarea es obligatorio',
            'fecha_final_tarea.required' => 'El campo fecha de final de tarea es obligatorio',
            'horas_estimadas.required' => 'El campo horas estimadas es obligatorio'
        ]);
        $task = new Task;
        $task->name =  $request->name;
        $task->descripcion =  $request->descripcion;
        $task->fecha_inicio_tarea =  $request->fecha_inicio_tarea;
        $task->fecha_final_tarea =  $request->fecha_final_tarea;
        $task->horas_estimadas =  $request->horas_estimadas;
        $task->project_id =  $request->project_id;
        $task->status_id =  $request->status_id;
        $task->create_by =  auth()->id();

        $task->save();
       
        return redirect()->back()->with('succes','Tarea creada correctamente');
     // Task::create($request->only('name','descripcion','tipo'));
   
           
    }

    //Mostrar las tareas
    public function show(Task $task)
    {
        abort_if(Gate::denies('task.show'),403);
        //$project = Project::find($id);
        
        return view('task.show', compact('task'));
    }

    //Editar una tarea
    public function edit(Task $task)
    {
        abort_if(Gate::denies('task.edit'),403);
        $projects= Project::all();
        $status = StatusTask::all();
        $users = User::all();
        return view('task.edit', compact('task','projects','status','users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */

    //Actualizar los datos de una tarea
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'fecha_inicio_tarea' => 'required',
            'fecha_final_tarea' => 'required',
            'horas_estimadas' => 'required',
            'status_id' => 'required',
            'project_id' => 'required',
            'user_id' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'fecha_inicio_tarea.required' => 'El campo fecha de inicio de tarea es obligatorio',
            'fecha_final_tarea.required' => 'El campo fecha de final de tarea es obligatorio',
            'horas_estimadas.required' => 'El campo horas estimadas es obligatorio'
        ]);
        $data=$request->only('name','descripcion','fecha_inicio_tarea','fecha_final_tarea','horas_estimadas','status_id','project_id','user_id');

      

        $task->update($data);
        return redirect()->route('tasks.index');
    }

    public function yours(){

        $user = auth()->id();
        $create = Task::join('users','users.id','=','tasks.create_by')
        
    ->where('tasks.create_by','=',$user)
     ->select('tasks.*')
    ->get();
           return view('task.yours',compact('create'));
    }

    public function destroy(Task $task)
    {
        $task ->delete();

        return back();
    }
}
