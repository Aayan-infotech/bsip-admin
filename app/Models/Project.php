<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'activity_id',
        'component_no',
        'component_title',
        'hin_component_title',
        'personnel',
        'hin_personnel',
        'status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }


}
