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

    public function getPdfSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->pdf);

        if (! $relativePath) {
            return 0;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // MB
        : 0;
    }
}
