<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=(['project_id','name','description','status','priority','deadline','file_path']);


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function file(){
        return $this->hasOne(File::class);
    }


}
