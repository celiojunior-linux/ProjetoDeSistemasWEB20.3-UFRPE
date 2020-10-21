<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $all_tasks = TaskModel::where("user_id",Auth::user()->id)->get()->values();
            return view("task.index", compact("all_tasks"));
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("task.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new TaskModel();
        $task->title = $request["title"];
        $task->desc = $request["desc"];
        $task->deadline = $request["deadline"];
        $task->state = 0;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TaskModel::findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = TaskModel::findOrFail($id);
        if($task->user_id != Auth::user()->id){
            return back();
        }
        return view("task.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = TaskModel::findOrFail($id);
        $task->title = $request["title"];
        $task->desc = $request["desc"];
        $task->deadline = $request["deadline"];
        $task->save();
        return redirect()->route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->delete();
        return back();
    }

    public function complete($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->state = !$task->state;
        $task->save();
        return back();
    }

    public function search(Request $request)
    {
        $content = $request["search"];
        if (!$content){
            echo $content;
            return redirect()->route("tasks.index");
        }
        $all = TaskModel::where("user_id",Auth::user()->id)->get()->values();
        $all_tasks = [];
        foreach($all as $task){
            if(strpos(strtoupper($content), strtoupper($task->title)) !== false
                or strpos(strtoupper($task->title), strtoupper($content)) !== false
                or strpos(strtoupper($content), strtoupper($task->desc)) !== false
                or strpos(strtoupper($task->desc), strtoupper($content)) !== false
                or strpos(strtoupper($content), strtoupper($task->deadline)) !== false
                or strpos(strtoupper($task->deadline), strtoupper($content)) !== false){
                    array_push($all_tasks, $task);
            }
        }
        return view("task.index", compact("all_tasks"));
    }

    public function deleteAll($userId)
    {
        TaskModel::where("user_id",Auth::user()->id)->delete();
        return back();
    }
}
