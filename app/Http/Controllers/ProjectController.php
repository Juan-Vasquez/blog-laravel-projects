<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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

        $project =  new Project($request->validated());

        $project->image = $request->file('image')->store('imagen', 'public');

        $project->save();

        //Redimensionando imagen
        $image = Image::make(Storage::get($project->image))
            ->widen(600)
            ->encode();

        Storage::put($project->image, (string) $image);

        return redirect()->route('projects.index')->with('status', 'Tu proyecto fue creado con exito.');
    }

    public function edit(Project $project) {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request) {

        if ($request->hasFile('image')) {

            Storage::delete($project->image);

            $project->fill($request->validated());

            $project->image = $request->file('image')->store('imagen');

            $project->save();

            //Redimensionando imagen
            $image = Image::make(Storage::get($project->image))
                ->widen(600)
                ->encode();

            Storage::put($project->image, (string) $image);


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
