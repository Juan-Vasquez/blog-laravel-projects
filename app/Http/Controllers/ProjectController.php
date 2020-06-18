<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }

    public function show(Project $project) {
        return view('projects.show', [
            'projects' => $project
        ]);
    }

    public function create() {
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    public function store(SaveProjectRequest $request) {

        Project::create($request->validated());

        return redirect()->route('projects.index')->with('status', 'Tu proyecto fue creado con exito.');
    }

    public function edit(Project $project) {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request) {
        $project->update($request->validated());

        return redirect()->route('projects.show', $project)->with('status', 'Tu proyecto fue actualizado con exito.');
    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Has eliminado tu proyecto con exito.');
    }

}
