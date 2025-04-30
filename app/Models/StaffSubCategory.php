<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffSubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_name',
        'sub_category_name_hin',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Staff_Category::class, 'category_id');
    }

    public function staff()
    {
        return $this->hasMany(Staff::class, 'sub_category_id');
    }
}
