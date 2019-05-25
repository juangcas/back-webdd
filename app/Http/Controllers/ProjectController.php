<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $name = $request->input('name');
        $description = $request->input('description');
        $category = $request->input('category');
        $yearMonth = $request->input('yearMonth');
        $langs = $request->input('langs');
        $url = $request->input('url');
        
        $image = $request->file('image_path');
        
        $project = new Project;
        $project->name = $name;
        $project->description = $description;
        $project->category = $category;
        $project->yearMonth = $yearMonth;
        $project->langs = $langs;
        $project->image = false;
        $project->url = $request->url;
        $project->save();

        if ($image != null && is_object($image)) {
            $imageName = 'P'.$project->id.'.'.$image->getClientOriginalExtension();
            Storage::disk('projects')->put($imageName,File::get($image));
            
            $project->image = true;
            $project->i_filename = $imageName;
            //
            
            $project->i_mime = $image->getClientMimeType();
            $project->i_url = '/projects/img/'.$project->id;
            $project->update();
        }

        return back()
            ->with('success','Proyecto creado')
            ->with('image',$imageName);
   }

   /**
    * Display the image of a specified resource.
    *
    * @param  \App\Project  $project
    * @return \Illuminate\Http\Response
    */
   public function getImage(Project $project)
   {
       $fileName = $project->i_filename;
       $file = Storage::disk('projects')->get($fileName);
       
       return new Response($file,200);
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return Project::where('id',$project->id)->get();
    }

    /**
     * Show t'he form for editing the specified resource.
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
