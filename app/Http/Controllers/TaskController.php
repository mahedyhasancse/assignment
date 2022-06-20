<?php

namespace App\Http\Controllers;

use App\Board;
use App\Status;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('kanban.task');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'board_id' => 'required',
            'description' => 'required'
        ]);
        $a =   Task::create([
            'title' => $request->name,
            'board_id' => $request->board_id,
            'description' =>  $request->description,
            'user_id'=>auth()->user()->id
        ]);
        Status::create([
            'task_id' => $a->id,
            'slug' => 'backlog',
        ]);
        toastr()->success('add successfully');
        return back();
    }

    public function update(Request $request,Task $task)
    {
        $this->validate($request, [
            'name' => 'required',
            'board_id' => 'required',
            'description' => 'required'
        ]);
        $task->update([
            'title' => $request->name,
            'board_id' => $request->board_id,
            'description' =>  $request->description,
            'user_id'=>auth()->user()->id
        ]);
     
        toastr()->success('Updated successfully');
        return back();
    }
    public function delete(Task $task){
     $task->delete();
     toastr()->success('Deleted successfully');
     return back();
    }
}
