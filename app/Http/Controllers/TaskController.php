<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use Pusher\Pusher;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();


        $task = Task::where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();
        return view('tasks.index',['message'=>$message,'notifications'=>$notifications,'license'=>$license,'task'=>$task,'image'=>$image,'name'=>$name]);
    }

    public function save_task(Request $request) {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notifications = User::select('users.id', 'users.name', 'users.email')
        ->selectRaw('COUNT(messages.is_read) AS unread')
        ->leftJoin('messages', function ($join) {
            $join->on('users.business_id', '=', 'messages.business_id')
                 ->where('messages.is_read', '=', 0);
        })
        ->where('users.business_id', Auth::user()->business_id)
        ->groupBy('users.id', 'users.name', 'users.email')
        ->first();

        $task = new Task;
        $task->title = $request['title'];
        $task->description = $request['description'];
        $title = $request->title;
        $task->business_id = Auth::user()->business_id;




        $message = new Message;
        $message->from = Auth::user()->id;
        $id = $message->from;
        $message->message = $title;
        $message->business_id = Auth::user()->business_id;

        $message->save();

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );


        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );


        $data = ['from' => $id];
        $pusher->trigger('my-channel', 'my-event', $data);


        if($task->save()) {
          return redirect('/save_task')->with('messages', "Task recorded successfully");;


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $task = Task::where('business_id', Auth::user()->business_id)->find($id);
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
        return view('tasks.task',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'task'=>$task,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
