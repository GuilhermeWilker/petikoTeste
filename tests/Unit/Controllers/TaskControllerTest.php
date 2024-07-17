<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;

it("can create a task",  function () {

    $request = new Request([
        'user_id' => 1,
        'name' => 'test'
    ]);



    $taskController = new TaskController;
    $taskController->store($request);

    expect(Task::where('name', 'test')->exists())->toBeTrue();
});
