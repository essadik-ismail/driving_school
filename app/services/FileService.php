<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService extends Service
{

    public function exists($path)
    {
        return !Storage::exists($path);
    }


    public function create(UploadedFile $uploadedFile)
    {
        $filePath = $uploadedFile->store('uploads', 'public');
        return $filePath;
    }


    public function read($path)
    {
        $url = Storage::url($path);
        return $url;
    }


    public function delete($path): void
    {
        $this->exists($path);
        Storage::delete($path);
    }


    public function download($path)
    {
        $this->exists($path);
        return Storage::download($path);
    }


    public function update(UploadedFile $uploadedFile, $path)
    {
        if ($this->exists($path)) {
            $this->delete($path);
            $filePath = $this->create($uploadedFile);
        }else{
            $filePath = $this->create($uploadedFile);
        }

        return $filePath;
    }
}
