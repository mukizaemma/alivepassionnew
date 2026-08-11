<?php

namespace App\Http\Controllers\Concerns;

use App\Services\ImageUploadService;
use Illuminate\Http\Request;

trait StoresOptimizedImages
{
    protected function storeOptimizedImage(
        Request $request,
        string $directory,
        string $field = 'image',
        bool $leadingSlash = false
    ): ?string {
        return app(ImageUploadService::class)->store(
            $request->file($field),
            $directory,
            $request->input('existing_'.$field),
            $leadingSlash
        );
    }
}
