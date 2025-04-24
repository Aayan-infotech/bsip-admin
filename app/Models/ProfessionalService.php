<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalService extends Model
{
    protected $table = 'professional_services';
    protected $fillable =[
        'staff_id',
        'service_name',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
