<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 'activities';

    protected $fillable = [
        'activity_name_id',
        'related_project',
        'hin_related_project',
        'project_title',
        'hin_project_title',
        'project_coordinator',
        'hin_project_coordinator',
        'project_co_coordinator',
        'hin_project_co_coordinator',
        'project_core_members',
        'hin_project_core_members',
        'associated_members',
        'hin_associated_members',
        'description',
        'hin_description',
        'status',
    ];

    public function activityName()
    {
        return $this->belongsTo(ActivitiesName::class, 'activity_name_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'activity_id');
    }
}
