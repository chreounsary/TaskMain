<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    use HasFactory;
    protected $table = 'partials';
    protected $fillable = ['id', 'action_temp_id', 'name', 'description', 'path', 'code'];
}
