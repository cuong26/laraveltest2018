<?php

namespace App\Helpers;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUpload
{
    public static function upload(UploadedFile $file, $folder, $name = null) {
        $destination = public_path() . '/upload/' . $folder;
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
            copy(public_path() . '/upload/index.html', $destination . '/index.html');
            copy(public_path() . '/upload/.ignore', $destination . '/.gitignore');
        }
        $extension = $file->getClientOriginalExtension();
        if (!$name) {
            $name = str_slug(explode('.', $file->getClientOriginalName())[0]);
        }
        $newName = $name;
        $newFile = $name . '.' . $extension;
        $count = 0;
        while (file_exists($destination . '/' . $newFile)) {
            $count++;
            $newName = $name . '-' . $count;
            $newFile = $newName . '.' . $extension;
        }
        if($file->move($destination, $newFile)) {
            return $newFile;
        };
        return null;
    }
}
