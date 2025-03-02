<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function(){

    $data = [
        'body' => 'Prueba de tarea',
        'user_id' => 1
    ];


    /* $task = new Task();

    $task->body = 'Prueba de tarea';
    $task->user_id = 1; 
    $task->save();*/

    $task = Task::create($data);

    return $task;

});