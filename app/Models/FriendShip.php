<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendShip extends Model
{
    use HasFactory;
    protected $table = 'friendship';
    protected $fillable = ['link_from', 'link_to', 'is_request'];
}
