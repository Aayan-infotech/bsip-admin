<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table    = 'news';
    protected $fillable = [
        'title',
        'title_hin',
        'slug',
        'description',
        'description_hin',
        'published_at',
        'image',
        'file',
        'status',
        'archived_status',
    ];

    public function getFileAttribute($value)
    {
        return $value ? url('storage/' . $value) : null;
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                $array = is_array($value) ? $value : json_decode($value, true);
                $cleaned = collect($array)->map(function ($item) {
                    return str_replace(url('storage/') . '/', '', $item);
                })->all();
                return json_encode($cleaned);
            },

            get: fn($value) => collect(json_decode($value, true))
                ->map(fn($val) => url('storage/' . $val))
                ->all()
        );
    }

}
