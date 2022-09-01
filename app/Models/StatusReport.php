<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function reports() {
        return $this->hasMany('App\Models\Report','status_id','id');
    }
}
