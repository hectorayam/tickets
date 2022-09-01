<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descripcion',
        'project_id',
        'status_id',
        'user_id'
        
    ];
    //Uno a muchos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function project(){
        return $this->belongsTo('App\Models\Project','project_id','id');
    }

    public function status(){
        return $this->belongsTo('App\Models\StatusReport','status_id','id');
    }
}