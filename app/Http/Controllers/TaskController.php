<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminHasTask;
use App\Models\Priority;
use App\Models\RoleHierarchy;
use App\Models\Task;
use App\Models\TransferLog;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //<------Index-------->
    
    public function index(){
        $current_auth_id = Auth::id();
        $admin = Admin::find($current_auth_id);

        return view('admin.task.index', ["admin"=>$admin]);
    }

    public function add(){
        $priorities = Priority::all();
        $admins = Admin::find(Auth::id())->canAssignTaskTo();

        //echo $current->parent()->id;

        return view('admin.task.add', [
            "priorities"=>$priorities,
            "admins"=>$admins
        ]);
    }

    public function create(Request $request){
        $request->validate([
            "title"=>"required",
            "description"=>"required",
            "deadline"=>"required",
            "priority"=>"required",
            "admins"=>"required",
        ]);

        $current_auth_id = Auth::id();

        $task = Task::create([
            "title"=>$request->get("title"),
            "description"=>$request->get("description"),
            "deadline"=>$request->get("deadline"),
            "priority_id"=>$request->get("priority"),
            "assigned_by"=>$current_auth_id,
        ]);

        $task->save();

        $task->admins()->attach($request->get('admins'));

        return redirect()->route('admin.task.index');

    }

    public function createUserTask(Request $request){
        $request->validate([
            "title"=>"required",
            "description"=>"required",
            "deadline"=>"required",
            "priority"=>"required",
            "admins"=>"required",
        ]);

        $current_auth_id = Auth::id();

        $task = Task::create([
            "title"=>$request->get("title"),
            "description"=>$request->get("description"),
            "deadline"=>$request->get("deadline"),
            "priority_id"=>$request->get("priority"),
            "assigned_by"=>$current_auth_id,
        ]);

        $task->save();

        $task->admins()->attach($request->get('admins'));

        $user_task = UserTask::find($request->get("id"));
        $user_task->task_id = $task->id;
        $user_task->save();

        return redirect()->route('admin.task.index');

    }

    public function manage($id){
        $task = Task::find($id);
        if($task->assigned_by!=Auth::id()){
            abort(401);
        }

        return view('admin.task.manage', ["task"=>$task]);
    }

    public function updateStatus($id){
        $assignedTask = AdminHasTask::where('task_id', $id)
                                    ->where('admin_id', Auth::id())
                                    ->first();

        if($assignedTask==null){
            abort(401);
        }

        $log = TransferLog::where('assign_task_id', $assignedTask->id)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $admins = Admin::find(Auth::id())->canAssignTaskTo();

        return view('admin.task.updatestatus', [
            "assignedTask"=>$assignedTask,
            "admins"=>$admins,
            "log"=>$log,
        ]);
    }

    public function markComplete(Request $request){
        $id = $request->get("id");

        $admintask = AdminHasTask::find($id);
        $admintask->status=1;

        $admintask->save();

        return redirect()->route('admin.task.updatestatus', $id);
    }

    public function sendRemark(Request $request){
        $id = $request->get("id");

        $admintask = AdminHasTask::find($id);
        $admintask->remark=$request->get("remark");

        $admintask->save();

        return redirect()->route('admin.task.updatestatus', $id);
    }

    public function transfer(Request $request){
        $assigned_task = AdminHasTask::find($request->get("id"));
        $transfer_log = TransferLog::create([
            "assign_task_id"=>$assigned_task->id,
            "transferred_by"=>$assigned_task->admin_id,
            "transferred_to"=>$request->get("transferred_to"),
            "remarks"=>$request->get("remarks")
        ]);

        $transfer_log->save();

        $assigned_task->admin_id = $request->get("transferred_to");
        $assigned_task->save();

        return redirect()->route('admin.task.index');
    }
}
