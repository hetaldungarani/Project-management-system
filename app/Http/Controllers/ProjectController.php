<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectImage;
use App\User;
use App\ProjectNote;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth'); 
    }
    public function index()
    {
        if(auth()->user()->user_type == 1){
        $projects = Project::with('user')->where('user_id',auth()->user()->id)->get();
        return view('Project.index',compact('projects'));
        }
        else{
            $projects = Project::with('user')->where('assign_project_to',auth()->user()->id)->get();
        return view('Project.designer.index',compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('user_type',2)->pluck('name','id');
        return view('Project.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->user_id = auth()->user()->id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->due_date = $request->due_date;
        $project->assign_project_to = $request->assign_project_to;
        $project->save();

        if($request->hasFile('filename')) {
            $imageNameArr = [];
            foreach ($request->filename as $file) {
                $imageName = time().'-'.$file->getClientOriginalName();
                $imageNameArr[] = $imageName;
                $file->move(public_path('images'), $imageName);
                $project_image = new ProjectImage();
                $project_image->project_id = $project->id;
                $project_image->filename = $imageName;
                $project_image->save();
            }
        }

        return redirect()->route('projects.index');

       
    }

    public function complete_project(Request $request)
    {
       Project::where('id',$request->project_id)->update(['is_complete'=>'1']);
    }
    public function project_note(Request $request)
    {
        ProjectNote::create($request->all());
        return Response::json(array('success'=>true,'result'=>$request->project_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function submit_project(Project $project,Request $request)
    {
        return view('Project.designer.submit_project');
    }
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
