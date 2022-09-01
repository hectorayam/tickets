<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Report;
use App\Models\StatusReport;
use App\Models\StatusTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;



use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = Report::all();
        // $reports = StatusReport::withCount(['reports'])->get();
       
      
        $projects = Project::all();

        $user = auth()->id();
        $yoursp = Project::join('users','users.id','=','projects.create_by')
        ->where('projects.create_by','=',$user)
        ->select('projects.*')
        ->get();
        $yourst = Task::join('users','users.id','=','tasks.create_by')
        ->where('tasks.create_by','=',$user)
        ->select('tasks.*')
        ->get();
        $yoursr = Report::join('users','users.id','=','reports.user_id')
        ->where('reports.user_id','=',$user)
        ->select('reports.*')
        ->get();
       
        $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index =>$month){
            $datas[$month] = $users[$index];
        }
        
        $report = Report::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
    $month = Report::select(DB::raw("Month(created_at) as month"))
    ->whereYear('created_at', date('Y'))
    ->groupBy(DB::raw("Month(created_at)"))
    ->pluck('month');

    
    $data = array(0,0,0,0,0,0,0,0,0,0,0,0);
    foreach($month as $index =>$month){
        $data[$month] = $report[$index];
    }
    
        
        return view('home',compact('reports','projects','yoursp','yourst','yoursr','datas','data'));

    }
   
    public function auth(User $user){

        $user=auth()->user()->id;
        return view('profile', compact('user'));
     
       
     }

     public function update(Request $request, User $user)
     {
         $request->validate([
             'name' => 'required|max:20',
             'email' => 'required|email',
             'telefono' => 'required|min:10'
         ],
         ['name.required' => 'EL campo nombre es obligatorio',
         'name.max' => ' El campo nombre debe ser menor a 10',
         'password.min' => 'El campo constraseña debe ser mayor a 8 caracteres',
         'password.max' => 'El campo contraseña no puede ser mayor a 10 caracteres',
         'telefono.required' => 'El campo telefono es obligatorio',
         'telefono.min' => 'El campo telefono debe ser mayor a 10 caracteres'
      ]);
         $data=$request->only('name','email','telefono');
 
        $password=$request->input('password');
        if($password)
         $data['password']=bcrypt($password);
         $user->update($data);
       
         return redirect()->back();
     }
 



     public function status()
     {  
         abort_if(Gate::denies('permission.index'),403);
         $statust = StatusTask::all();
         $statusr = StatusReport::all();
         $categories = Category::all();
         return view('status',compact('statusr','statust','categories'));
     }
}
