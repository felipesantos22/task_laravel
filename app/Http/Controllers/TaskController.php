<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    public function index()
    {
        $tasks = $this->task->all();
        //return response()->json(['message' => $task], 200);
        return view('form', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->task->create($request->all());
        //return response()->json(['message' => 'Item created'], 201);
        return redirect()->route('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = $this->task->create($request->all());
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = $this->task->find($id);
        if ($task === null) {
            return ['Task not found.'];
        }
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = $this->task->find($id);
        $task->update($request->all());
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = $this->task->find($id);
        if ($task === null) {
            return ['Task not found.'];
        }
        $task->delete();
        return ['Task deleted!'];
    }
}
