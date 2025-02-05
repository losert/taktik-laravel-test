<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    // GET /api/tasks – výpis úkolů s filtrováním, řazením a stránkováním
    public function index(Request $request)
    {
        $cacheKey = 'tasks_page_' . $request->input('page', 1);

        $tasks = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($request) {
            $query = Task::query();

            // Filtrování podle názvu
            if ($request->has('title')) {
                $query->where('title', 'like', '%'.$request->input('title').'%');
            }

            // Řazení
            if ($request->has('sort_by')) {
                $order = $request->input('order', 'desc');
                $query->orderBy($request->input('sort_by'), $order);
            }

            return $query->paginate(10);
        });

        return response()->json($tasks);
    }

    // GET /api/tasks/{id} – detail úkolu
    public function show($id)
    {
        die('test-test');
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    // POST /api/tasks – vytvoření nového úkolu
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'completed'   => 'required|boolean',
        ]);

        $task = Task::create($data);
        return response()->json($task, 201);
    }

    // PUT /api/tasks/{id} – aktualizace úkolu
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $data = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'completed'   => 'sometimes|required|boolean',
        ]);

        $task->update($data);
        return response()->json($task);
    }

    // DELETE /api/tasks/{id} – smazání úkolu
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
