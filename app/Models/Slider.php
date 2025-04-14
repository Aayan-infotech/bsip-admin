<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    //
    use HasFactory;

    protected $fillable = ['title', 'sequence', 'image', 'is_active', 'hin_title', 'status'];
}
