<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $tasks = $this->getTasks(
            $user,
            $request->query('search'),
            false
        );

        return Inertia::render('Index', [
            'user' => $user,
            'tasks' => $tasks,
        ]);
    }

    public function archived(Request $request)
    {
        $user = Auth::user();

        $tasks = $this->getTasks(
            $user,
            $request->query('search'),
            true
        );

        return Inertia::render('Archived', [
            'user' => $user,
            'tasks' => $tasks,
        ]);
    }

    private function getTasks($user, $searchQuery = null, $done = false)
    {
        return $user->todos()
            ->where('done', $done)
            ->where(function ($query) use ($searchQuery) {
                if ($searchQuery) {
                    $query->where('name', 'LIKE', "%$searchQuery%");
                }
            })
            ->get();
    }
}
