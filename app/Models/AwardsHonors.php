<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardsHonors extends Model
{
    protected $table = 'awards_honors';
    protected $fillable = [
        'staff_id',
        'award_name',
        'award_year',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
