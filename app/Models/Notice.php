<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
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
        'expiry_date',
        'archived_status',
    ];


    public function getPdfSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->pdf);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
            ? round(filesize($filePath) / 1024 / 1024, 2) // MB
            : null;
    }
}
