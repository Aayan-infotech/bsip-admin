<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class RajBhashaPortal extends Model
{
    protected $table = 'raj_bhasha_portals';

    protected $fillable = [
        'title',
        'title_hin',
        'description',
        'description_hin',
        'date',
        'images',
        'pdf_file',
        'status',
        'archived_status',
    ];

    public function getPdfFileAttribute($value)
    {
        return $value ? url('storage/' . $value) : null;
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

    protected function images(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                $array   = is_array($value) ? $value : json_decode($value, true);
                $cleaned = collect($array)->map(function ($item) {
                    return str_replace(url('storage/') . '/', '', $item);
                })->all();
                return json_encode($cleaned);
            },
            get: function ($value) {
                if ($value) {
                    return collect(json_decode($value, true))
                        ->map(fn($val) => url('storage/' . $val))
                        ->all();
                } else {
                    return [];
                }
            },
        );
    }

}
