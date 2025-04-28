<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $table = 'lecturers';

    protected $fillable = [
        'lecturer_name',
        'hin_lecturer_name',
        'status',
    ];

   public function lectures()
    {
        return $this->hasMany(Lectures::class, 'lecturer_id');
    }

}
