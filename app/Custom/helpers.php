<?php

use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//upload media
function uploadMedia(UploadedFile $file, string $directory = 'uploads/media', string $disk = 'public'): ?Media
{
    $originalName = $file->getClientOriginalName();
    $extension    = $file->getClientOriginalExtension();
    $mimeType     = $file->getMimeType();
    $size         = $file->getSize();
    $fileName     = (string) Str::uuid() . '.' . $extension;

    $file->storeAs($directory, $fileName, $disk);

    return Media::create([
        'name'      => $originalName,
        'file_name' => $fileName,
        'mime_type' => $mimeType,
        'extension' => $extension,
        'disk'      => $disk,
        'directory' => $directory,
        'size'      => $size,
        'status'    => 1,
    ]);
}

//delete media
function deleteMedia(int $mediaId): bool
{
    $media = Media::find($mediaId);

    if (! $media) {
        return false; // Media not found
    }

    $filePath = $media->directory . '/' . $media->file_name;

    try {
        // Delete file from disk if it exists
        if (Storage::disk($media->disk)->exists($filePath)) {
            Storage::disk($media->disk)->delete($filePath);
        }
        // Delete DB record
        $media->delete();
        return true;

    } catch (\Exception $e) {
        Log::error("Failed to delete media ID {$mediaId}: " . $e->getMessage());
        return false;
    }
}

//date formatter
function dateFormatter($date, string $outputFormat = 'F j, Y'): ?string
{
    if (! $date) {
        return null;
    }

    try {
        return Carbon::parse($date)->format($outputFormat);
    } catch (\Exception $e) {
        return null;
    }
}
