<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignToUser;
use Illuminate\Http\Request;

class TaskAssignToUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        TaskAssignToUser::create($request->all());
         return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(TaskAssignToUser $taskAssignToUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskAssignToUser $taskAssignToUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskAssignToUser $taskAssignToUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskAssignToUser $taskAssignToUser)
    {
        //
    }
}
