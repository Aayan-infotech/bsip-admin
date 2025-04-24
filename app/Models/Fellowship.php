<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    protected $table = 'fellowships';
    protected $fillable = [
        'staff_id',
        'fellowship_name'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
