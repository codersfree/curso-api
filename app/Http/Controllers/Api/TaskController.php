<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query();

        //Paginacion
        if (request()->has('perPage')) {
            $tasks = $tasks->paginate(request()->query('perPage'));
        }else{
            $tasks = $tasks->get();
        }

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        /* $request->validate([
            'body' => 'required',
            'user_id' => ['required', 'exists:users,id'],
        ]); */

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //$task = Task::find($task);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        /* $request->validate([
            'body' => 'required',
            'user_id' => ['nullable', 'exists:users,id'],
        ]); */

        //$task = Task::find($task);
        $task->update($request->all());

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //$task = Task::find($task);
        $task->delete();

        return response()->json(null, 204);
    }
}
