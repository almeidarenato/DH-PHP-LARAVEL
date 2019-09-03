<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where('done', '<>', '1')->get();
        return response()->json($tasks, 200);
    }
    public function create(Request $request)
    {
        if (!$request->has('description')) {
            return response()->json('Field description doesn\'t have default value', 400);
        }
        $task = new Task;
        $task->description = $request->input('description');
        $task->done = false;

        $task->save();
        return response()->json($task, 200);
    }
    public function done($id)
    {
        $task = Task::find($id);
        $task->done = true;
        $task->save();
        return response()->json($task, 200);
    }
    public function delete($id)
    {
        $task = Task::find($id);

        try {
            if ($task) {
                $task->delete();
                return response()->json(["result" => "task deleted"], 200);
            } else
                return response()->json(["result" => "no task found"], 200);
        } catch (Exception $e) {
            return response()->json(["result" => $e], 500);
        }
    }
}
