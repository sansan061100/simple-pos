<?php

use Illuminate\Support\Facades\Storage;

function uploadImage($file, $path, $oldFile = null)
{
    if ($file) {
        if (Storage::disk('public')->exists($path . '/' . $oldFile)) {
            Storage::disk('public')->delete($path . '/' . $oldFile);
        }

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $upload = Storage::disk('public')->putFileAs($path, $file, $fileName);

        return $fileName;
    } else {
        return $oldFile;
    }
}
