<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','email','password','mobile','dob','date_join','designation','department','gender','image','status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(){
        return $this->belongsToMany(Task::class, 'admin_has_tasks')->withTimestamps();
    }

    public function givenTasks(){
        return $this->hasMany(Task::class, 'assigned_by');
    }

    public function canAssignTaskTo(){
        $admins = collect();

        $current_role = Admin::find($this->id)->getRoleNames()[0];
        $current_role_id = Role::where('name', $current_role)->first()->id;

        $current = RoleHierarchy::where('role_id', $current_role_id)->first();
        $heirarchies = RoleHierarchy::all();

        if($current_role=="Super Admin"){
            $admins = Admin::all();
        }else{
            do{
                $current = $current->parent();
                $heirarchies = $heirarchies->except($current->id);
            }while($current->parent_id!=0);
    
            foreach($heirarchies as $heirarchy){
                foreach(Role::find($heirarchy->role_id)->users as $admin){
                    $admins->add($admin);
                }
            }
        }

        return $admins;
    }
}
