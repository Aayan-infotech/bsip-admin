<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annual_Report extends Model
{

    protected $table = 'annual__reports';

    protected $fillable = [
        'report_name',
        'report_hin_name',
        'report_file',
        'report_file_hin',
        'more_info',
        'more_info_hin',
        'archived_status',
        'status',
    ];

    public function getReportFileAttribute($value)
    {
        return asset('storage/' . $value);
    }
    public function getReportFileHinAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
