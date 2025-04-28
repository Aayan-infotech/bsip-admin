<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff_Category extends Model
{
    protected $table = 'staff__categories';

    protected $fillable = [
        'category_name',
        'category_name_hin',
    ];

}
