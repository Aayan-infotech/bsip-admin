<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastDirectors extends Model
{
    protected $table = 'past_directors';

    protected $fillable = [
        'name',
        'hin_name',
        'from_month',
        'from_year',
        'to_month',
        'to_year',
        'image',
        'status'
    ];

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
