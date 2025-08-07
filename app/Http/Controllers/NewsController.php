<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManagerStatic as Image; (composer require intervention/image)
use App\Models\News;
use App\Models\Blogimages;

class NewsController extends Controller
{
    public function index()
    {

        $blogs = News::latest()->paginate(10);
        return view('admin.news', [
            'blogs' => $blogs
        ]);
    }

    // public function showAll()
    // {
    //     $blogs = News::latest()->paginate(10);
    //     return view('pages.blogs.home', [
    //         'blogs' => $blogs
    //     ]);
    // }

    // public function showSingle($slug)
    // {
    //     $blog = Blog::where('slug', $slug)->first();
    //     return view('pages.blogs.blog', compact('blog'));
    // }

    // public function show($id)
    // {
    //     $blog = News::find($id);
    //     return view('pages.blogs.blog', compact('blog'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $fileName = '';
        if($request->hasFile('image')){
            $file = $request->file('image');

            $path = $file->store('public/images/news');
            $fileName = basename($path);
        }

        // Generate the slug
        $slug = Str::of($request->input('title'))->slug();

        // Check if a blog post with the same slug already exists
        $blog = News::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'body' => $request->input('body'),
                'image' => $fileName,
                'slug' => $slug
            ]
        );

        if($request->hasFile('gallery')){
            $galleryImages = $request->file('gallery');
            foreach($galleryImages as $gallery){
                $path = $gallery->store('public/images/galleries');
                $fileName = basename($path);
                $blog->Blogimages()->create(['gallery' => $fileName]);
            }
        }

        return redirect('blogs')->with('success', 'Blog post created successfully');

    }


    public function edit($id)
    {
        $blog = News::find($id);
        return view('admin.newsUpdate', compact('blog'));
    }


    public function update(Request $request, $id)
    {
        $blog = News::find($id);

        // Check if the request has an image
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/images/news/'.$blog->image);
            // Store the new image
            $file = $request->file('image');
            $path = $file->store('public/images/news');
            $fileName = basename($path);
            $blog->image = $fileName;
        }

        // Check if the request has any gallery images
        if ($request->hasFile('gallery')) {
            // Delete the old gallery images
            $oldGallery = $blog->Blogimages;
            foreach ($oldGallery as $image) {
                Storage::delete('public/images/galleries/'.$image->gallery);
                $image->delete();
            }
            // Store the new gallery images
            $galleryImages = $request->file('gallery');
            foreach($galleryImages as $gallery){
                $path = $gallery->store('public/images/galleries');
                $fileName = basename($path);
                $blog->Blogimages()->create(['gallery' => $fileName]);
            }
        }

        // Update the other fields
        $blog->title = $request->input('title');
        $blog->author = $request->input('author');
        $blog->body = $request->input('body');
        $blog->slug = Str::of($request->input('title'))->slug();
        $blog->save();

        return redirect('blogs')->with('success', 'News post has been updated successfully');
    }




    public function destroy($id)
    {
        $blog = News::findOrFail($id);
        $image = $blog->image;
        $galleries = $blog->Blogimages;
        // delete the image file
        Storage::delete('public/images/news/'.$image);
        // delete the gallery files
        foreach($galleries as $gallery) {
            Storage::delete('public/images/galleries/'.$gallery->gallery);
        }
        $blog->Blogimages()->delete();
        $blog->delete();

        return back()
            ->with('success', 'News deleted successfully');
    }

    public function publish(Blog $blog): RedirectResponse
    {
        $blog->published_at = now();
        $blog->published_by = auth()->id();
        $blog->save();

        return back()->with('success', 'News published successfully');
    }
}
