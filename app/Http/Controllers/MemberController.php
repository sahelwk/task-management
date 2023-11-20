<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Project;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:member-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:member-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $members = Member::all();
        $projects = Project::all();
        $organizations = Organization::all();

        return view('members.index',['members'=>$members , 'projects'=>$projects ,'organizations'=>$organizations]);
    }

    public function create()
    {
        $projects = Project::all();
        $organizations = Organization::all();
        $departments = Department::all();
        return view('members.create',compact('projects','organizations','departments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'org_id' => 'nullable|integer',
            'dep_id' => 'nullable|integer',
            'project_id' => 'nullable|integer',
            'task_id' =>'nullable|integer',
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email',
        ]);
        return $request;

        $member=Member::create($request->all());



        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'org_id' => 'required|integer',
            'dep_id' => 'required|integer',
            'project_id' => 'required|integer',
            'task_id'   => 'required|integer',
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function delete(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
