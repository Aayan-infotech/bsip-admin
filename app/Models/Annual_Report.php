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

    protected $appends = [
        'report_file_size',
        'report_file_hin_size',
    ];

    public function getReportFileAttribute($value)
    {
        // dd($value);
        $filePath         = public_path('storage/' . $value);
        $report_file_size = file_exists($filePath) ? round(filesize($filePath) / 1024 / 1024, 2) : null;
        // dd($report_file_size);
        return asset('storage/' . $value);
    }
    public function getReportFileHinAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // use Illuminate\Support\Facades\URL;

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
        if (! $this->report_file_hin) {
            return null;
        }

        $relativePath = str_replace(url('storage') . '/', '', $this->report_file_hin);
        $filePath     = public_path('storage/' . $relativePath);

        return file_exists($filePath)
        ? round(filesize($filePath) / 1024 / 1024, 2) // in MB
        : null;
    }

}
