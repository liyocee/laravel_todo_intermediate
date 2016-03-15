<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //attribute that are mass assignable
    protected $fillable = ['name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];


    /**
    Get a user that owns a task
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
