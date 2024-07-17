<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return Inertia::render('User/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => 'required',
            'is_admin' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

        if ($user) {
            return redirect('/admin');
        } else {
            return redirect()->back();
        }
    }
}
