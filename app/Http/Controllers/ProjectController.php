<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Events\ProjectSave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'projects' => Project::with('category')->latest()->paginate()
        ]);
    }

    public function show(Project $project) {
        return view('projects.show', [
            'projects' => $project
        ]);
    }

    public function create() {
        return view('projects.create', [
            'project' => new Project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request) {

        $project =  new Project($request->validated());

        $project->image = $request->file('image')->store('imagen');

        $project->save();

        ProjectSave::dispatch($project);

        return redirect()->route('projects.index')->with('status', 'Tu proyecto fue creado con exito.');
    }

    public function edit(Project $project) {
        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request) {

        if ($request->hasFile('image')) {

            Storage::delete($project->image);

            $project->fill($request->validated());

            $project->image = $request->file('image')->store('imagen');

            $project->save();

            //Redimensionando imagen
            ProjectSave::dispatch($project);


        } else {

            $project->update(array_filter($request->validated()));

        }


        return redirect()->route('projects.show', $project)->with('status', 'Tu proyecto fue actualizado con exito.');
    }

    public function destroy(Project $project) {

        Storage::delete($project->image);

        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Has eliminado tu proyecto con exito.');
    }

}
