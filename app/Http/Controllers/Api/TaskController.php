<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:api', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::getOrPaginate();

        /* return response()->json($tasks); */
        return TaskResource::collection($tasks);
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

        $data = $request->all();
        $data['user_id'] = auth('api')->id();

        $task = Task::create($data);
        //return response()->json($task, 201);

        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //$task = Task::find($task);
        //return response()->json($task);

        return TaskResource::make($task);
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

        //return response()->json($task);

        return TaskResource::make($task);
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
