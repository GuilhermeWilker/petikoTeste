<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('home');
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home');
    }
}
