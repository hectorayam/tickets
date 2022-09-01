<?php

namespace App\Http\Controllers;


use App\Models\StatusReport;
use Illuminate\Support\Facades\Gate;


use Illuminate\Http\Request;


class StatusReportController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('status.index'),403);
        $statusr = StatusReport::all();
        return view('status',compact('statusr'));
    }
  
    public function create()
    {
        abort_if(Gate::denies('status.create'),403);
        return view('statusreport.create');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required' 
       ],
       [
        'name.required' => 'El campo nombre es obligatorio'
       ]);

      StatusReport::create($request->only('name'));
    return redirect()->route('menu');
           
    }

    public function show($id)
    {
       
    }

    
    public function edit(StatusReport $status)
    {
        abort_if(Gate::denies('status.edit'),403);
        return view('statusreport.edit', compact('status'));
    }

   
    public function update(Request $request, StatusReport $status)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
           
        ],
        [
         'name.required' => 'El campo nombre es obligatorio'
        ]);
        $status->update($request->only('name'));
        return redirect()->route('menu');
    }

    
    public function destroy(StatusReport $status)
    {
        $status->delete();

        return back();
    }

   

}

