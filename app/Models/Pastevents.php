<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pastevents extends Model
{
    //
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'hin_title',
        'pdf',
        'facebook_url',
        'youtube_url',
        'status',
        'archived_status',
    ];

    public function getPdfAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
