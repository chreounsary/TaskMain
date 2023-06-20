<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';
    protected $fillable = ['id', 'project_id', 'name', 'description'];

    public function project()
    {
       return $this->belongsTo(Project::class);
    }
    
    public function module()
    {
      return $this->belongsTo(Module::class);
    }

    public function action()
    {
      return $this->hasMany(Action::class);
    }

    public function components()
    {
      return $this->hasMany(components::class);
    }
}
