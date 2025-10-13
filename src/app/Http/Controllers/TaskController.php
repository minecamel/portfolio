<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->orderBy('registered_at', 'desc')
                     ->get();

        return view('taskboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'memo' => 'nullable|string',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'registered_at' => now(),
            'due_date' => $validated['due_date'] ?? null,
            'memo' => $validated['memo'] ?? null,
        ]);

        return redirect()->route('taskboard'); // ルート名に合わせる
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('taskboard');
    }
}
