<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Department;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class ReportController extends Controller
{


public function index(){

$organizations = Organization::count();
$projects = Project::count();
$tasks = Task::count();
$departments = Department::count();
$allUsers = User::count();


$adminRole = User::role(['Admin'])->count();


return view('reports.index',compact('organizations','projects','tasks','departments','allUsers','adminRole'));



}

public function generateReport()
{
    $organizations = Organization::count();
$projects = Project::count();
$tasks = Task::count();
$departments = Department::count();
$allUsers = User::count();
$adminRole = User::role(['Admin'])->count();
    // Generate your report data here
    $pdf = PDF::loadView('reports.pdf',compact('organizations','projects','tasks','departments','allUsers','adminRole'));

    return $pdf->download('taskManagerProReport.pdf');
}
public function create()
{
    return view('reports.create');
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

     Report::create($validatedData);

    return redirect()->route('reports.index')->with('success', 'Report created successfully.');
}


}
