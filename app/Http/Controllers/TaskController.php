<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $task = new Task;
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()->route('tasks.single', ['task' => $task->id])
        ->with('success', 'Tạo task thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task, TaskRequest $request)
    {
        $data = $request->validated();

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()->route('tasks.single', ['task' => $task->id])
        ->with('success', 'Sửa task thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks')
        ->with('success', 'Xóa thành công task');
    }

    public function singleTask($id)
    {
        $task = Task::findOrFail($id);

        return view('single', ['task' => $task]);
    }

    public function tonggleCompleted(Task $task)
    {
        $task->tonggleComplete();

        return redirect()->back()
        ->with('success', 'Cập nhật task thành công!');
    }
}
