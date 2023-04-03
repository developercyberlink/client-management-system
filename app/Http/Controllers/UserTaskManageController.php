<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Priority;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTaskFeedback;
use Illuminate\Support\Facades\Validator;

class UserTaskManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('user_task_access');
        $tasks = UserTask::all();

        return view('admin.usertask.index', ["tasks"=>$tasks]);
    }

    public function single($id){
        $this->authorize('user_task_access');
        $task = UserTask::find($id);
        $admins = Admin::find(Auth::id())->canAssignTaskTo();
        $priorities = Priority::all();

        return view('admin.usertask.single', [
            "task"=>$task,
            "admins"=>$admins,
            "priorities"=>$priorities
        ]);
    }

    public function markComplete(Request $request){
        $id = $request->get("id");

        $usertask = UserTask::find($id);
        $usertask->completion_time= Carbon::now();

        $usertask->save();

        return redirect()->route('admin.usertask.index');
    }

    public function feedback($id){
        $data = UserTask::find($id);
        $messages = UserTaskFeedback::where('user_task_id', $id)->orderBy('created_at', 'asc')->get();

        return view('admin.usertask.feedback', compact('data', 'messages'));
    }

    public function pushFeedback(Request $request){

        // Validation
        $validator = Validator::make($request->all(), [
            'message'=>'required',
        ]);

        // Validation error message
        if($validator->fails()){
            return response()->json([
                "status"=>'error',
                "errors"=>$validator->errors()->all()
            ]);
        }

        // Create object
        $message = UserTaskFeedback::create([
            "message"=>$request->message,
            "user_task_id"=>$request->id,
            "sender"=>1,
        ]);

        return response()->json([
            "status"=>"success",
        ]);
    }

}
