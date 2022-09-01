<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Report;
use App\Models\StatusReport;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('report.index'),403);
        $reports = Report::all();
        return view('report.index',compact('reports'));
    }

    //Crear un reporte
    public function create()
    {
        abort_if(Gate::denies('report.create'),403);
        $projects = Project::all();
        $status = StatusReport::all();
        return view('report.create',compact('projects','status'));
    }

    //Guardar un reporte
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
     
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'descripcion' => 'El campo descripcion es obligatorio'
        ]);
      
      $report = new Report;
      $report->name = $request->name;
      $report->descripcion = $request->descripcion;
      $report->status_id =$request->status_id;
      $report->user_id =  auth()->id();
      $report->project_id = $request->project_id;
      $report->save();
      
      
    // $input = $request->all();
    // $input2=auth()->id();
    
    // Report::create($input,$input2);
    return redirect()->back()->with('succes','Reporte creado correctamente');
           
    }

    //Mostrar un reporte
    public function show($id)
    {
        //$project = Project::find($id);
        abort_if(Gate::denies('report.show'),403);
        $report = Report::find($id);
       
        if($report ==''){
            return abort(404, 'Page not found.');
        }
    else
        return view('report.show', compact('report'));
    }

    //Editar un reporte
    public function edit($report)
    {
        abort_if(Gate::denies('report.edit'),403);
        $projects = Project::all();
        $report = Report::find($report);
        $status = StatusReport::all();
        return view('report.edit', compact('report','projects','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'project_id' => 'required',
            'status_id' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio'
        ]);

        $data=$request->only('name','descripcion','status_id','project_id','user_id');

       
        $report->update($data);
        // $input = $request->all();
        // $report->name = $input['name'];
        // $report->descripcion = $input['descripcion'];
        // $report->project_id = $input['project_id'];
        // $report->project_id = $input['status_id'];

        // $report->save();
        return redirect()->route('reports.index');
    }

    public function yours(){

        $user = auth()->id();
        $create = Report::join('users','users.id','=','reports.user_id')
        
    ->where('reports.user_id','=',$user)
     ->select('reports.*')
    ->get();
           return view('report.yours',compact('create'));
    }

    public function destroy(Report $report)
    {
        $report ->delete();

        return back(); 
    }
}
