<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

   protected $fillable=['dep_id','name'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_id');
    }
    public function tasks(){

        return $this->hasMany(Task::class);
    }
    public function users(){

        return $this->hasMany(User::class);
    }
}
