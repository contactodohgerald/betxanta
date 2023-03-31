<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FileUpload {

    
    function uploadFile($file, $folder = 'files'){
        $file = Cloudinary::uploadFile($file->getRealPath(), [
            'folder' => "xantabets/$folder"
        ])->getSecurePath();
        return $file;
    }

}