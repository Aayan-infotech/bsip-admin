<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tender extends Model
{
    //
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_no',
        'title',
        'hin_title',
        'tender_document',
        'start_date',
        'end_date',
        'status',
        'archived_status',
    ];

    public function getTenderDocumentSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->tender_document);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
            ? round(filesize($filePath) / 1024 / 1024, 2) // MB
            : null;
    }
}
