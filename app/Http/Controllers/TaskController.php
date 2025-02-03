<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller{
    public function index(){
        $tasks=Task::paginate(3);
        return view('task.index',compact('tasks'));
    }
    public function create(){
        // dd(session()->all());
        return view('task.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);
    // dd($validatedData);exit;
        Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'status' => $validatedData['status'],
            'created_by' => session('userId'),
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }
    public function edit(Task $task){
        return view('task.edit',compact('task'));
    }
    public function update(Request $request, Task $task){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Pending,In Progress,Completed',
            'updated_at'=>date('Y-m-d i:h:s'),
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success','Task updated successfully!');
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task deleted successfully!');
    }
}
