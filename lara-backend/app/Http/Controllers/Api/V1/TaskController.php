<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::authUser()->latest()->take(5)->get();
        // $tasks = Task::all();
        return Helper::successWithData($tasks, 'tasks');
    }

    public function getSingle(Task $task){
        return Helper::successWithData($task, 'task');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'due_date' => 'required'
        ]);

        $data = [
            'user_id'=> auth()->user()->id,
            'title' => $validated['title'],
            'details' => $validated['details'],
            'due_date' => $validated['due_date'],
            'create_date' => date('d-m-y'),
        ];

        $task = $request->user()->tasks()->create($data);
        return Helper::successWithData($task, 'Created_Task', 'Task created successfully', 201);
    }

    public function update(Request $request, Task $task)
    {
        // $this->authorize('update', $task);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'sometimes|nullable|string',
            'due_date' => 'sometimes|nullable|string',
        ]);

        // return $data;
        $task->update($data);
        return Helper::successWithData($task, 'Task', 'Task updated successfully.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        // $this->authorize('update', $task);
        
        if($task->status == 0){
            $task->status = 2;
            $task->start_date = date('d-m-y');
            $task->save();
        } elseif($task->status == 2) {
            $task->status = 1;
            $task->complete_date = date('d-m-y');
            $task->save();
        }

        return Helper::successWithData($task, 'task');
    }

    public function destroy(Task $task)
    {
        // $this->authorize('delete', $task);
        $taskId = $task->id;
        $task->delete();
        return Helper::successWithData($taskId, 'taskId', 'Deleted successfully', 204);
    }

}
