<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchHighlights extends Model
{
    protected $table = 'research_highlights';

    protected $fillable = [
        'title',
        'hin_title',
        'year',
        'link',
        'hindi_file',
        'english_file'
    ];

    public function getHindiFileAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function getEnglishFileAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

}
