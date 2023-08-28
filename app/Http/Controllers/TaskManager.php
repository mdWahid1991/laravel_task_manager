<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Session;
use UploadedFile;

class TaskManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$assign = User::get()->where('assign_to_id' , Session::get('loginId'));
        if(Session::get('loginId') === 1)
        {
            $task = Task::get();
        }else{
            $task = Task::get()->where('assign_to_id' , Session::get('loginId'));
        }

        return view('/Task/TaskList', compact('task')) ;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ],
            [
                'label' => 'Delay',
                'value' => 'Delay',
            ],
            [
                'label' => 'Emergency',
                'value' => 'Emergency',
            ]
        ];
        $assign = User::orderby('id','desc')->get();
        return view('/Task/TaskCreate', compact('statuses','assign'));
        //return view('/Task/TaskCreate') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required'
        ]);
        $fileName = "";
        $user = User::where('name','=',$request->assign_to )->first();
        if($request->file('upload') == NULL || $request->file('upload') == "")
        {

        }else{
        $fileName = time(). "img." . $request->file('upload')->getClientOriginalExtension();
        $request->file('upload')->storeAs('public/uploads',$fileName);
        }

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->publisher_name = "Admin";
        $task->publisher_id = "1";
        $task->assign_to_name = $request->assign_to;
        $task->assign_to_id = $user->id;
        $task->status = $request->status;
        $task->user_comment = $request->comment;
        $task->upload_file = $fileName;
        $task->save();
        return redirect()->route('task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ],
            [
                'label' => 'Delay',
                'value' => 'Delay',
            ],
            [
                'label' => 'Emergency',
                'value' => 'Emergency',
            ]
        ];
        $assign = User::get();
        
        return view('/Task/TaskEdit', compact('statuses','assign','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);
        
        $user = User::where('name','=',$request->assign_to )->first();
        $fileName = "";
        if($request->file('upload') == NULL || $request->file('upload') == "")
        {

        }else{
        $fileName = time(). "img." . $request->file('upload')->getClientOriginalExtension();
        $request->file('upload')->storeAs('public/uploads',$fileName);
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->publisher_name = "Admin";
        $task->publisher_id = "1";
        $task->assign_to_name = $request->assign_to;
        $task->assign_to_id = $user->id;
        $task->status = $request->status;
        $task->user_comment = $request->comment;
        $task->upload_file = $fileName;
        $task->save();

        return redirect()->route('task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Task::find($id)->delete();
        return redirect()->route('task');
    }
}
