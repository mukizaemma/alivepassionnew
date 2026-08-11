<?php

namespace App\Http\Controllers;

use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request, ImageUploadService $images)
    {
        return response()->json([
            'images' => $images->list($request->query('folder')),
        ]);
    }
}
