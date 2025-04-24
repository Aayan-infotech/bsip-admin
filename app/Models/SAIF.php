<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

}
