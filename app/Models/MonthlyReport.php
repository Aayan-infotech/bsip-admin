<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    protected $table = 'monthly_reports';

    protected $fillable = [
        'report_name',
        'report_hin_name',
        'report_file',
        'report_file_hin',
        'report_month',
        'status',
        'archived_status',
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
