<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['org_id','dep_id','task_id','project_id','task_id','name','role','email'];


   public function project(){

       return $this->belongsTo(Project::class , 'project_id');

   }
   public function organization(){

    return $this->belongsTo(Organization::class , 'org_id');

}
public function department(){

    return $this->belongsTo(Department::class , 'dep_id');

}
public function task(){

    return $this->belongsTo(Task::class , 'task_id');

}

}
