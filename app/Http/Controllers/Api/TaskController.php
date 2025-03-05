<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        $task = Task::find($task);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task)
    {
        $task = Task::find($task);
        $task->update($request->all());

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task = Task::find($task);
        $task->delete();

        return response()->json(null, 204);
    }
}
