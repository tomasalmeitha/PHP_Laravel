<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResourceCollection;

class TaskAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): TaskResourceCollection
    {
        return new TaskResourceCollection(resource: Task::paginate());
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
    }

    /**
     * Display the specified resource.
     */

    /* public function show(Task $task)
    {
        return $task;
    } */

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
