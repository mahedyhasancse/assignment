<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable=[
        'task_id','slug'
    ];
    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function board(){
        return $this->hasMany(Board::class,'board_id');
    }
}
