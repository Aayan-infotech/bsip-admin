<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SAIF extends Model
{
    protected $table = 'saifs';

    protected $fillable = [
        'employee_id',
        'instrument_name',
        'instrument_name_hin',
        'description_hin',
        'description',
        'image',
        'pdf_file',
        'status',
        'archived_status',
    ];

    public function getPdfFileAttribute($value)
    {
        return $value ? url('storage/' . $value) : null;
    }

    public function getImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : null;
    }

    public function scientist()
    {
        return $this->belongsTo(Staff::class, 'employee_id');
    }

    // get the size of the pdf file in MB
    public function getPdfFileSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->pdf_file);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // MB
        : null;
    }

}
