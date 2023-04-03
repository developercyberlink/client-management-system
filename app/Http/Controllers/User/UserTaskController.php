<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserTaskFeedback;

class UserTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){

        return view('user.task.index');
    }

    public function create(Request $request){
        $request->validate([
            "title"=>"required",
            "description"=>"required"
        ]);

        UserTask::create([
            "title"=>$request->get("title"),
            "description"=>$request->get("description"),
            "assigned_by"=>Auth::user()->id,
        ]);

        return redirect()->route('user.task.index');
    }

    public function feedback($id){
        $data = UserTask::find($id);
        $messages = UserTaskFeedback::where('user_task_id', $id)->orderBy('created_at', 'asc')->get();

        return view('user.task.feedback', compact('data', 'messages'));
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
            "sender"=>0,
        ]);

        return response()->json([
            "status"=>"success",
        ]);
    }
}
