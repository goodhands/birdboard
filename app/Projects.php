<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function path(){
        return "/projects/{$this->id}";
    }

    // protected $guard = [];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function addTask($body){

        return $this->tasks()->create(compact('body'));
    
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
