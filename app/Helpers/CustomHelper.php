<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

function commonUploadImage($storage_path, $file_path)
{
    $storage_path = 'public/' . $storage_path;
    $file_store_path = Storage::disk('local')->put($storage_path, $file_path);
    return $file_store_path;
}

function getUploadImage($storage_path)
{
    return Storage::url($storage_path);
}
