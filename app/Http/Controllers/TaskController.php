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
        $tasks = Task::all();
        $taskData = [];

        foreach($tasks as $task){
            $tasksData[] = [
                'id' => $task -> id,
                'title' => $task -> title,
                'body' => $task -> body,
                'state' => $task -> state,
                'authorId' => $this -> getData($task -> author_id, $request),
                'userAssignedId' => $this -> getData($task -> user_assigned_id, $request)
            ];
        }
        return $tasksData;
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

    private function getData($id, $request){
        $tokenHeader = [
            "Authorization" => $request -> header("Authorization"),
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];

        $response = Http::withHeaders($tokenHeader) -> get ( "http://localhost:8000/api/v1/register/" . $id);
        return $response -> json();
    }
}
