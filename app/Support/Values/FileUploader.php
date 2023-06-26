<?php

namespace App\Support\Values;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public function upload(UploadedFile $file, string $directory = 'uploads'): string
    {
        return $file->store($directory, 'public');
    }

    public function uploadProduct(UploadedFile $file, string $directory = 'uploads', string $fileName = 'file', string $options = 'public'): string
    {
        if ($fileName === 'file') {
            $fileName = $file->getClientOriginalName() ?? time();
        }

        return $file->storeAs($directory, $fileName, $options);
    }

}
