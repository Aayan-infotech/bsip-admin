<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastHeads extends Model
{

    protected $table = 'past_heads';

    protected $fillable = [
        'name',
        'hin_name',
        'designation',
        'hin_designation',
        'from_month',
        'hin_from_month',
        'from_year',
        'to_month',
        'hin_to_month',
        'to_year',
        'image',
        'status'
    ];

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
