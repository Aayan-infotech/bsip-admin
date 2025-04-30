<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsoredProjects extends Model
{
    protected $table = 'sponsored_projects';

    protected $fillable = [
        'project_title',
        'hin_project_title',
        'project_coordinator',
        'hin_project_coordinator',
        'funding_agency',
        'hin_funding_agency',
        'project_no',
        'project_cost',
        'start_date',
        'duration',
        'hin_duration',
        'status',
    ];
}
