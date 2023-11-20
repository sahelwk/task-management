<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
         $notifications = auth()->user()->unreadNotifications;
         $projects = Project::all();
        $organizations = Organization::all();
        $users = User::all();
        $departments=Department::all();
        $tasks = Task::all();
        return view('home',['organizations'=>$organizations,
        'departments'=>$departments,'users'=> $users ,
        'projects'=>$projects,'tasks'=>$tasks,'notifications'=>$notifications]);

    }
    
    public function markNotification(Request $request)
{
    auth()->user()
        ->unreadNotifications
        ->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })
        ->markAsRead();

    return response()->noContent();
}
}
