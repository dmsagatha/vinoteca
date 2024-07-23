<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadService
{
  public static function upload(UploadedFile $file, string $folder, $disk = 'public'): string
  {
    // Obtener el nombre del archivo sin la extensión
    $filename = pathinfo($file->getClientOriginalName(), flags:PATHINFO_FILENAME);

    // Extensión
    $extension = $file->getClientOriginalExtension();

    // Adicionar la marca del tiempo al nombre del archivo
    $filename = $filename . '-' . time() . '.' . $extension;

    return $file->storeAs($folder, $filename, $disk);
  }

  public static function delete(string $path, $disk = 'public'): bool
  {
    if (! Storage::disk($disk)->exists($path)) 
    {
      return false;
    }

    return Storage::disk($disk)->delete($path);
  }

  public static function url(string $path, string $disk = 'public'): string
  {
    return Storage::disk($disk)->url($path);
  }
}