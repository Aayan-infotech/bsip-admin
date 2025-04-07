<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'module_id',
        'page_url',
        'sequence',
        'status',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function rights()
    {
        return $this->hasMany(UserRight::class, 'page_id');
    }
}
