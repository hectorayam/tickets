<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descripcion',
        'project_id',
        'status_id',
        'user_id',
        'fecha_inicio_tarea',
        'fecha_final_tarea',
        'horas_estimadas',
        'create_by'
        
    ];
    //Uno a muchos inverso
    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

    public function status(){
        return $this->belongsTo('App\Models\StatusTask','status_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function create(){
        return $this->belongsTo('App\Models\User','create_by','id');
    }

}
