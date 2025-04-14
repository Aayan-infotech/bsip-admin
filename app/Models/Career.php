<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
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
        'url',
        'interview_date',
        'interview_time',
        'last_date',
        'status',
        'archived_status',
    ];
}
