<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'board_id', 'description','user_id'
    ];
    public function board()
    {
        return   $this->belongsTo(Board::class, 'board_id');
    }
    public function status()
    {
        return $this->hasMany(Status::class, 'task_id');
    }
    public function user(){
        return   $this->belongsTo(User::class, 'user_id');

    }
}
