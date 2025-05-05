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
            'content' => 'required|string',
        ]);

        $post = Task::create($data);
        return response()->json($post, 201);
    }

    public function show(Task $post)
    {
        return $post;
    }

    public function update(Request $request, Task $post)
    {
        $post->update($request->only(['title', 'content']));
        return response()->json($post);
    }

    public function destroy(Task $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
