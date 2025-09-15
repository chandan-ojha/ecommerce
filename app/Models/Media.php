<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'name',
        'file_name',
        'mime_type',
        'extension',
        'disk',
        'directory',
        'size',
        'status',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): string
    {
        // If directory exists, include it, else just file name
        $path = $this->directory
        ? $this->directory . '/' . $this->file_name
        : $this->file_name;

        return Storage::disk($this->disk)->url($path);
    }
}
