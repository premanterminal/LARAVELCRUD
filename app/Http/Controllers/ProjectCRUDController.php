<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCRUDController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['projects'] = project::orderBy('id','desc')->paginate(5);
    return view('masterdata.projects.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.projects.create');
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
    'name' => 'required',
    'pic' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'address' => 'required',
    'city' => 'required',
    'province' => 'required',
    'post_code' => 'required'
    ]);
    $project = new Project;
    $project->name = $request->name;
    $project->pic = $request->pic;
    $project->email = $request->email;
    $project->phone = $request->phone;
    $project->address = $request->address;
    $project->city = $request->city;
    $project->province = $request->province;
    $project->post_code = $request->post_code;
    $project->save();
    return redirect()->route('projects.index')
    ->with('success','Project has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function show(Project $project)
    {
    return view('masterdata.projects.show',compact('project'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function edit(Project $project)
    {
    return view('masterdata.projects.edit',compact('project'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'pic' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'province' => 'required',
        'post_code' => 'required'
    ]);
    $project = project::find($id);
    $project->name = $request->name;
    $project->pic = $request->pic;
    $project->email = $request->email;
    $project->phone = $request->phone;
    $project->address = $request->address;
    $project->city = $request->city;
    $project->province = $request->province;
    $project->post_code = $request->post_code;
    $project->save();
    return redirect()->route('projects.index')
    ->with('success','Project Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function destroy(Project $project)
    {
    $project->delete();
    return redirect()->route('projects.index')
    ->with('success','Project has been deleted successfully');
    }
}
