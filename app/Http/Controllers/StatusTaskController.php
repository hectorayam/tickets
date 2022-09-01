<?php

namespace App\Http\Controllers;

use App\Models\StatusTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StatusTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('status.create'),403);
        return view('statustask.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' 
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio'
    ]);
 
       StatusTask::create($request->only('name'));
     return redirect()->route('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusTask $status)
    {
        abort_if(Gate::denies('status.edit'),403);
        return view('statustask.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusTask $status)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
           
        ],[
            'name.required' => 'El campo nombre es obligatorio'
        ]);
        $status->update($request->only('name'));
        return redirect()->route('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusTask $status)
    {
        $status->delete();

        return back();
    }
}
