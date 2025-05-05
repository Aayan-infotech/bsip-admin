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

    // Get the file size of the hindi and english files in MB
    public function getHindiFileSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->hindi_file);
        $filePath = public_path('storage/' . $relativePath);
        return file_exists($filePath) ? round(filesize($filePath) / 1024 / 1024, 2) : null;
    }
    public function getEnglishFileSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->english_file);
        $filePath = public_path('storage/' . $relativePath);
        return file_exists($filePath) ? round(filesize($filePath) / 1024 / 1024, 2) : null;
    }


}
