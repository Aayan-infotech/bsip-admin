<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute_Catalogue extends Model
{
    protected $table = 'institute__catalogues';

    protected $fillable = [
        'catalogue_name',
        'catalogue_hin_name',
        'writer_name',
        'writer_hin_name',
        'cover_image',
        'cover_image_hin',
        'catalogue_file',
        'catalogue_file_hin',
        'more_info',
        'more_info_hin',
        'status',
        'archived_status',
    ];

    public function getCatalogueFileAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getCatalogueFileHinAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // get the size of the file  of the catalogue

    public function getCatalogueFileSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->catalogue_file);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // MB
        : null;
    }
    public function getCatalogueFileHinSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->catalogue_file_hin);
        if (! $relativePath) {
            return null;
        }
        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // in MB
        : null;
    }

}
