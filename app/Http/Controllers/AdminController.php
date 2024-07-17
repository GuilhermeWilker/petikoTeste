<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::withCount([
            'todos as completed_tasks_count' => function ($query) {
                $query->where('done', true);
            },
            'todos as pending_tasks_count' => function ($query) {
                $query->where('done', false);
            },
        ])->paginate(4);

        return Inertia::render('Dashboard', [
            'users' => $users
        ]);
    }

    public function create()
    {
    }
}
