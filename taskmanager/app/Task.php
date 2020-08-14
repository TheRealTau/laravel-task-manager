<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['name', 'user_id'];
    // use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
