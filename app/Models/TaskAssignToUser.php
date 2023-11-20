<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignToUser extends Model
{
    protected $table = 'task_user';
    use HasFactory;
    protected $fillable = ['name','user_id','task_id'];
}
