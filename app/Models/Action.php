<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partial;
use App\Models\Project;

class Action extends Model
{
  use HasFactory;
  protected $table = 'actions';
  protected $fillable = ['id', 'name', 'description'];

  public function task()
  {
    return $this->belongsTo(Task::class);
  }

  public function template()
  {
    return $this->hasMany(ActionTemplate::class);
  }

  public function schema()
  {
    return $this->hasOne(Schema::class);
  }

  public function formBuilder()
  {
    return $this->hasOne(FormBuilder::class);
  }
  #####
  public function getProject($task_id)
  {
    $q = $this->join('tasks', 'tasks.id', '=', 'actions.task_id')
                ->select('tasks.project_id')
                ->where('tasks.id', $task_id)
                ->first();
    return $q->project_id;
  }

  public function getProjectName($id)
  {
    $q = Project::find($id);
    
    return $q->name;
  }
  public function models($value='')
  {
    return $this->hasOne(Models::class);
  }
}
