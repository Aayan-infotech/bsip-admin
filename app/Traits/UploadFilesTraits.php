<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFilesTraits
{
    public static function uploadFile($file, $destinationPath)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // Storage method is commented out
        $file->storeAs($destinationPath, $fileName, 'public');

        // Move the file to the specified path
        // $destinationPath = 'uploads/' . $destinationPath;

        // if (! file_exists(public_path($destinationPath))) {
        //     mkdir(public_path($destinationPath), 0755, true);
        // }
        //
        // $file->move(public_path($destinationPath), $fileName);
        return $destinationPath . '/' . $fileName;
    }

    public static function deleteFile($filePath)
    {
        $relativePath = str_replace(url('/'), '', $filePath);
        $fullPath     = public_path($relativePath);

        if (file_exists($fullPath)) {
            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            } else {
                unlink($fullPath);
            }
        }
    }

}
