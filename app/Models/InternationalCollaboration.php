<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternationalCollaboration extends Model
{

    protected $table = 'international_collaborations';
    protected $fillable = [
        'staff_id',
        'collaboration_name',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
