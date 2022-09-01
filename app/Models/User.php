<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'status',
        'horas',
        'pago',
        'total_sueldo'
        
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Muchos a muchos
    public function project(){
        return $this->belongsToMany('App\Models\Project','project_user','project_id','user_id');
    }

    public function company(){
        return $this->belongsToMany('App\Models\Company','company_user','user_id','company_id');
    }

    //Uno a muchos
    public function reports() {
        return $this->hasMany('App\Models\Report');
    }

    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }

    public function proposal() { 
        return $this->hasMany('App\Models\Project');
    }

    public function creatask() { 
        return $this->hasMany('App\Models\Task');
    }

}
