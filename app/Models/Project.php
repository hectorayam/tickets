<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class Project extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'name',
        'description',
        'fecha_inicio',
        'fecha_final',
        'presupuesto_mano',
        'persupuesto_material',
        'category_id',
        'create_by',
        'url'
        
    ];

    //Relacion muchos a muchos
    public function user(){
        return $this->belongsToMany('App\Models\User','project_user','project_id','user_id')->as('user');
    }

    //Relacion uno a muchos
    public function reports() {
        return $this->hasMany('App\Models\Report');
    }
    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function create(){
        return $this->belongsTo('App\Models\User','create_by','id');
    }


    public function image(){
        return $this->hasMany('App\Models\Image');
    }
   
}
