<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    
    public function Create(Request $request){
        $task = new Task();
        $task -> title = $request -> post('title');
        $task -> body = $request -> post('body');
        $task -> state = $request -> post('state');
        $task -> author_id = $request -> post('authorId');
        $task -> user_assigned_id = $request -> post('userAssignedId');
        $task -> save();

        return $task;
    }

    public function Read(Request $request){
        return $task = Task::all();
    }

    public function Find(Request $request, $id){
        return $task = Task::findOrFail($id);
    }

    public function Update(Request $request, $id){
        $task = Task::findOrFail($id);

        $task -> title = $request -> post('title');
        $task -> body = $request -> post('body');
        $task -> state = $request -> post('state');
        $task -> author_id = $request -> post('authorId');
        $task -> user_assigned_id = $request -> post('userAssignedId');
        $task -> save();

        return $task;
    }

    public function Delete(Request $request, $id){
        $task = Task::findOrFail($id);
        $task -> delete();

        return ['message' => 'Deleted'];
    }
}
