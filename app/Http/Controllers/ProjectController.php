<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{



    function __construct()
    {
        $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $projects = Project::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%")
                     ->orWhere('dep_id' , 'like' , "%$search%");       
       })->paginate(10);
       return view('projects.index', compact('projects'));
    }

    public function create()
    {
        // Return the create view
        $departments = Department::all();
        return view('projects.create',compact('departments'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'dep_id' => 'nullable|integer',
            'name' => 'required|string',
        ]);

        // Create a new project with the validated data
        Project::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        // Find the project with the given ID
        $project = Project::findOrFail($id);
       $departments = Department::get();
        // Return the edit view with the project data
        return view('projects.edit', compact('project','departments'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'dep_id' => 'nullable|integer',
            'name' => 'required|string',
        ]);

        // Find the project with the given ID and update its data
        $project = Project::findOrFail($id);
        $project->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function show($id)
    {
        // Find the project with the given ID
        $project = Project::findOrFail($id);

        // Return the show view with the project data
        return view('projects.show', compact('project'));
    }

    public function delete($id)
    {
        // Find the project with the given ID and delete it
        $project = Project::findOrFail($id);
        $project->delete();

        // Redirect to the index page with a success message
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
