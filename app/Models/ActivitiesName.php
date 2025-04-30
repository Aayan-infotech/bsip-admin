<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitiesName extends Model
{

    protected $table = 'activities_names';

    protected $fillable = [
        'activity_name',
        'hin_activity_name',
        'status',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'activity_name_id');
    }
}
