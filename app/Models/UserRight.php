<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'page_id',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship with the Page model.
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }


    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
