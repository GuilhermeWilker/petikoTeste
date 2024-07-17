<?php

namespace App\Listeners;

use App\Events\TaskMarkedAsDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteTaskAfterDelay implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskMarkedAsDone $event)
    {
        $task = $event->task;

        if ($task->done) {
            $task->delete();
        }
    }
}
