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

    public function getReportFileSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->report_file);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
            ? round(filesize($filePath) / 1024 / 1024, 2) // MB
            : null;
    }
    public function getReportFileHinSizeAttribute()
    {
        $relativePath = str_replace(url('storage') . '/', '', $this->report_file_hin);

        if (! $relativePath) {
            return null;
        }

        $filePath = public_path('storage/' . $relativePath);

        return file_exists($filePath)
            ? round(filesize($filePath) / 1024 / 1024, 2) // MB
            : null;
    }
}
