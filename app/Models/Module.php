<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'module_url',
        'sequence',
        'status',
    ];

    public function allpages()
    {
        return $this->hasMany(Page::class, 'module_id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'module_id')->where('status', 1);
    }
}
