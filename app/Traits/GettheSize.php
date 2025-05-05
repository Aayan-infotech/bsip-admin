<?php
namespace App\Traits;

trait GettheSize
{
    public static function getFileSizeInMB($relativePath, $precision = 2)
    {
        $filePath = public_path($relativePath);
        if (file_exists($filePath)) {
            $fileSizeInBytes = filesize($filePath);
            return round($fileSizeInBytes / 1048576, $precision); // Convert to MB
        }
        return 0;
    }

}
