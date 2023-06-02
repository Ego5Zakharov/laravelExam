<?php

namespace App\Support\Values;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public function upload(UploadedFile $file, string $directory = 'uploads'): string
    {
        return $file->store($directory, 'public');
    }
}
