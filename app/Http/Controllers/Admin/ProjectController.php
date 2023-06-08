<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Framework;
use App\Models\Technology;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(3);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $frameworks = Framework::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('frameworks', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;
        $project = Project::create($data);
        if($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $frameworks = Framework::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'frameworks', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;
        $project->update($data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->sync([]);
        }
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "Your project: '$project->name', has been successfully deleted");
    }
}
