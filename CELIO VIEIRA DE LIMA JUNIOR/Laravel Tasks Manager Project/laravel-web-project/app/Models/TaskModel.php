<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = "task_list";
    protected $fillable = ["id", "title","description","deadline","state","user_id","created_at", "updated_at"];
    public $timestamps = false;
}
