<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionTemplate extends Model
{
    use HasFactory;
    protected $table = 'action_templates';

    public function partials()
    {
        return $this->hasMany(Partial::class);
    }
    
    public function getPartials($template_id)
    {
        return $this->join('partials', 'action_templates.id', '=', 'partials.action_temp_id')
                ->select('partials.*')
                ->where('action_temp_id', $template_id)
                ->get();
    }
}
