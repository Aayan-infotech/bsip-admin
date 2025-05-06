<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forms extends Model
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
        'document',
        'hin_document',
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
    public function getDocumentSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->document);

        if (! $relativePath) {
            return 0;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // MB
        : 0;
    }
    public function getHinDocumentSizeAttribute()
    {
        if (! $this->hin_document) {
            return 0;
        }

        $relativePath = str_replace(url('storage') . '/', '', $this->hin_document);

        if (! $relativePath) {
            return 0;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // MB
        : 0;
    }
  
}

