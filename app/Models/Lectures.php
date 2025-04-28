<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $table = 'lectures';

    protected $fillable = [
        'lecture_title',
        'hin_lecture_title',
        'lecture_description',
        'hin_lecture_description',
        'lecturer_id',
        'status',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturers::class, 'lecturer_id');
    }
}
