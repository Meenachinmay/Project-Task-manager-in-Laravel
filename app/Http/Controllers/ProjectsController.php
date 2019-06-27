<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Project;

class ProjectsController extends Controller
{


    public function index(){

        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }


    public function store(){

        // validate
        $attributes = $this->validateRequest();

        // persists
        $project = auth()->user()->projects()->create($attributes);

       return redirect($project->path());
    }


    public function edit(Project $project){

        return view('projects.edit', compact('project'));
    }


    public function show(Project $project){

        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    // Update
    public function update(UpdateProjectRequest $request ,Project $project){

        $request->save();

        return redirect($project->path());
    }


    public function create(){

        return view('projects.create');
    }


    public function destroy(Project $project){

        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');

    }

    /**
     * @return array
     */
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required|max:100',
            'notes' => 'nullable'
        ]);
    }

}
