<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class GeoHeritage extends Model
{
    protected $table = 'geo_heritages';
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
