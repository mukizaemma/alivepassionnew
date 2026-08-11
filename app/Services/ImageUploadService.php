<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    public const MAX_BYTES = 700 * 1024;

    public function store(?UploadedFile $file, string $directory, ?string $existing = null, bool $leadingSlash = false): ?string
    {
        $directory = trim($directory, '/');
        $filename = null;

        if ($file) {
            $filename = $this->storeUploaded($file, $directory);
        } elseif ($existing) {
            $filename = $this->useExisting($existing, $directory);
        }

        if (!$filename) {
            return null;
        }

        return $leadingSlash ? '/'.$filename : $filename;
    }

    public function list(?string $folder = null): array
    {
        $folder = trim((string) $folder, '/');
        $base = 'public/images';
        $preferred = $folder ? $base.'/'.$folder : $base;

        $preferredFiles = $this->filesFrom($preferred);
        $allFiles = $this->filesFrom($base);

        $seen = [];
        $images = [];

        foreach (array_merge($preferredFiles, $allFiles) as $path) {
            if (isset($seen[$path])) {
                continue;
            }
            $seen[$path] = true;
            $images[] = [
                'path' => $path,
                'filename' => basename($path),
                'url' => asset('storage/'.Str::after($path, 'public/')),
                'folder' => trim(Str::after(dirname($path), 'public/images'), '/'),
            ];
        }

        return $images;
    }

    protected function filesFrom(string $directory): array
    {
        if (!Storage::exists($directory)) {
            return [];
        }

        return collect(Storage::allFiles($directory))
            ->filter(function ($path) {
                return preg_match('/\.(jpe?g|png|gif|webp|svg)$/i', $path);
            })
            ->sortByDesc(fn ($path) => Storage::lastModified($path))
            ->values()
            ->all();
    }

    protected function storeUploaded(UploadedFile $file, string $directory): string
    {
        if ((int) $file->getSize() <= self::MAX_BYTES) {
            return basename($file->store($directory));
        }

        return $this->compressAndStore($file, $directory);
    }

    protected function useExisting(string $existing, string $directory): ?string
    {
        $source = $this->resolveExistingPath($existing);

        if (!$source) {
            return null;
        }

        $basename = basename($source);
        $destination = $directory.'/'.$basename;

        if ($source !== $destination && !Storage::exists($destination)) {
            Storage::copy($source, $destination);
        }

        return $basename;
    }

    protected function resolveExistingPath(string $existing): ?string
    {
        $existing = ltrim(str_replace('\\', '/', $existing), '/');
        $candidates = [
            $existing,
            'public/'.$existing,
            'public/images/'.$existing,
            'public/images/'.basename($existing),
        ];

        foreach ($candidates as $candidate) {
            if (Storage::exists($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    protected function compressAndStore(UploadedFile $file, string $directory): string
    {
        if (!function_exists('imagecreatefromstring')) {
            return basename($file->store($directory));
        }

        $binary = @file_get_contents($file->getRealPath());
        $source = $binary ? @imagecreatefromstring($binary) : false;

        if (!$source) {
            return basename($file->store($directory));
        }

        $width = imagesx($source);
        $height = imagesy($source);
        $quality = 82;
        $scale = 1.0;
        $jpegPath = tempnam(sys_get_temp_dir(), 'apimg').'.jpg';

        do {
            $targetW = max(1, (int) round($width * $scale));
            $targetH = max(1, (int) round($height * $scale));
            $canvas = imagecreatetruecolor($targetW, $targetH);
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
            imagecopyresampled($canvas, $source, 0, 0, 0, 0, $targetW, $targetH, $width, $height);
            imagejpeg($canvas, $jpegPath, $quality);
            imagedestroy($canvas);

            $size = @filesize($jpegPath) ?: PHP_INT_MAX;

            if ($size <= self::MAX_BYTES) {
                break;
            }

            if ($quality > 55) {
                $quality -= 8;
            } else {
                $scale *= 0.85;
                $quality = 72;
            }
        } while ($scale > 0.25);

        imagedestroy($source);

        $filename = Str::random(40).'.jpg';
        Storage::put($directory.'/'.$filename, file_get_contents($jpegPath));
        @unlink($jpegPath);

        return $filename;
    }
}
