<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\File;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Pow;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('project.index'),403);
        $admin = Auth::user()->company;
        if($admin->isEmpty()){
           
            $projects = Project::All();
         return view('project.index',compact('projects'));
        }
         
        elseif($admin->isNotEmpty()){
            $company = Auth::user()->company;
        foreach($company as $company){
         $i =$company->name;
        }
        $projects = Project::join('users','users.id','=','projects.create_by')
                                ->join('company_user','users.id','=','company_user.user_id')
                            ->join('companies','companies.id','=','company_user.company_id')
                            ->where('companies.name','=',$i)
                             ->select('projects.*')
                            ->get();
        
        return view('project.index',compact('projects'));
        }
    }

    public function prop()
    {
        // // abort_if(Gate::denies('project.index'),403);
        // $projects = Project::with('create')->get();
        // $users = User::all();
        
        $projects = Project::join('users','users.id','=','projects.create_by')
                                ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                            ->join('roles','roles.id','=','model_has_roles.role_id')
                            ->where('roles.name','=','Cliente')
                             ->select('projects.*')
                            ->get();
      
        // $projects = Project::all();
        // $project = $projects->users()->roles()->where('name','Cliente');
        // dd($project);
       
        return view('project.proposal',compact('projects'));
    }
    
    //Crear un proyecto
    public function create()
    {   
        abort_if(Gate::denies('project.create'),403);
        
        $admin = Auth::user()->company;
        if($admin->isEmpty()){
            $users = User::all();
            $categories = Category::all();
            return view('project.create',compact('users','categories'));
        }
         
        elseif($admin->isNotEmpty()){
            $company = Auth::user()->company;
        foreach($company as $company){
         $i =$company->name;
        }
        $users = User::join('company_user','users.id','=','company_user.user_id')
                        ->join('companies','companies.id','=','company_user.company_id')
                        ->where('companies.name','=',$i)
                        ->select('users.*')
                        ->get();
        $categories = Category::all();

    }
        return view('project.create',compact('users','categories'));
    }

    public function client()
    {
        $user= User::pluck('name','id')->except(1);
        $users = User::all();
        $categories = Category::all();

   
        return view('project.client',compact('user','users','categories'));
    }

    //Guardar los datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'presupuesto_mano' => 'required',
            'presupuesto_material' => 'required',
            'category_id' =>'required',
           
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'fecha_inicio' => 'El campo fecha de inicio es obligatorio',
            'fecha_final' => 'El campo fecha de final es obligatorio',
            'presupuesto_mano' => 'El campo presupuesto de mano de obra es obligatorio',
            'presupuesto_material' => 'El campo presupuesto de material es obligatorio'
        ]);
        
      //Project::create($request->only('name','description','tipo'));
      
    
     
      $project = new Project;
      $project->name = $request->name;
      $project->description = $request->description;
      $project->fecha_inicio = $request->fecha_inicio;
      $project->fecha_final = $request->fecha_final;
      $project->presupuesto_mano = $request->presupuesto_mano;
      $project->presupuesto_material = $request->presupuesto_material;
      $project->category_id = $request->category_id;
     
      $project->create_by =  auth()->id();
      
      $project->save();
      if($request->has('image')){
        foreach($request->file('image')as$image){
            $imageName='-image-'.time().rand(1,1000).'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $project->image()->create([
                'url'=>$imageName
                ]);
        }
    }
    
      $project->user()->attach($request->user_id);
      
      
     
    return redirect()->back()->with('succes','Proyecto creado correctamente');   
    }

    public function proposal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'fecha_inicio' => 'required'],
            [
                'name.required' => 'El campo nombre es obligatorio',
                'description.required' => 'El campo descripcion es obligatorio',
                'fecha_inicio' => 'El campo fecha de inicio es obligatorio',
            ]);
        
      //Project::create($request->only('name','description','tipo'));
      $project = new Project;
      $project->name = $request->name;
      $project->description = $request->description;
      $project->fecha_inicio = $request->fecha_inicio;
      $project->category_id = $request->category_id;
      $project->create_by =  auth()->id();
      $project->save();
     
    return redirect()->back()->with('succes','Propuesta creado correctamente');   
    }

    //Mostrar proyecto
    public function show( $id)
    {
        abort_if(Gate::denies('project.show'),403);
        $project = Project::find($id);


    //     $projects = Project::join('images','images.project_id','=', 'project'.$project)
    //  ->select('images.url')
    // ->get();
    // dd($projects);
        if($project ==''){
            return abort(404, 'Page not found.');
        }
    else
        return view('project.show', compact('project'));
   
    }

    //Editar los datos del proyecto
    public function edit(Project $project)
    {
        abort_if(Gate::denies('project.edit'),403);
        $users= User::all();
        $categories = Category::all();
        return view('project.edit', compact('project','users','categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'presupuesto_mano' => 'required',
            'presupuesto_material' => 'required',
            'category_id' =>'required'
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'description.required' => 'El campo descripcion es obligatorio',
            'fecha_inicio' => 'El campo fecha de inicio es obligatorio',
            'fecha_final' => 'El campo fecha de final es obligatorio',
            'presupuesto_mano' => 'El campo presupuesto de mano de obra es obligatorio',
            'presupuesto_material' => 'El campo presupuesto de material es obligatorio'
        ]);
        $data3=$request->only('name');
        $data=$request->only('description');
        $data2=$project->user()->sync($request->user_id);
        $project->fecha_inicio = $request->fecha_inicio;
        $project->fecha_final = $request->fecha_final;
        $project->presupuesto_mano = $request->presupuesto_mano;
        $project->presupuesto_material = $request->presupuesto_material;
        $project->category_id = $request->category_id;
        $project->update($data,$data2,$data3);
        if($request->has('image')){
            foreach($request->file('image')as$image){
                $imageName='-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('images'),$imageName);
                $project->image()->create([
                    'url'=>$imageName
                    ]);
            }
        }
        return redirect()->route('projects.index');
    }
    
    public function yours(){

        $user = auth()->id();
        $create = Project::join('users','users.id','=','projects.create_by')
        
    ->where('projects.create_by','=',$user)
     ->select('projects.*')
    ->get();
           return view('project.yours',compact('create'));
    }

    public function destroy(Project $project)
    {
        $project ->delete();

        return back();
    }



    public function removeImg($id){
        
        $image = Image::find($id);
        if(!$image)abort(404);
        unlink(public_path('images/'.$image->url));
        $image->delete();
        return back()->with('success','Good');
    } 
    
    

    public function addImg(Request $request, $id){
        $project = Project::find($id);
        if(!$project) abort(404);
        if($request->has('image')){
        foreach($request->file('image')as $image){
            $imageName='-image-'.time().rand(1,1000).'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $project->image()->create([
                'url'=>$imageName
                ]);
        }
    }
}
}
