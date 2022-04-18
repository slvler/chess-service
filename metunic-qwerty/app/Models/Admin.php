<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{


    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
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




    public function permissions(){
        return $this->belongsTomany(Permission::class,'users_permissions');
    }
    public function roles(){
        return $this->belongsTomany(Role::class,'admins_roles');
    }

    // check has role
    public function hasRole(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('slug',$role)){
                return true;
            }
        }
        return false;
    }



    // Admin_role relationship


    public function adminRolesDetail() {
        return $this->hasOne('App\Models\AdminRole','admin_id','id');
    }

    public function AdminRole() {
        return $this->belongsToMany('App\Models\Role', 'admins_roles','admin_id','role_id');
    }



}
