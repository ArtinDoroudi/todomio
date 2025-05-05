<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_completed' => 'required|string',
        ]);

        $task = Task::create($data);
        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        $task->load('tags');
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only(['title', 'description', 'is_completed']));
        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }

    public function attachTag(Task $task, $tagId)
    {
        $task->tags()->attach($tagId);
        return response()->json(['message' => 'Tag attached successfully.']);
    }

    public function deleteTag(Task $task, $tagId)
    {
        $task->tags()->detach($tagId);
        return response()->json(['message' => 'Tag detached successfully.']);
    }
}
