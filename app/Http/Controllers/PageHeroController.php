<?php

namespace App\Http\Controllers;

use App\Models\PageHero;
use Illuminate\Http\Request;

class PageHeroController extends Controller
{
    public function index()
    {
        $heroes = PageHero::ensurePages();
        $pages = PageHero::catalog();

        return view('admin.page-heroes', compact('heroes', 'pages'));
    }

    public function update(Request $request)
    {
        foreach (array_keys(PageHero::catalog()) as $key) {
            $hero = PageHero::firstOrCreate(['page_key' => $key]);
            $image = $this->storeOptimizedImage($request, 'public/images', 'hero_'.$key);

            if ($image) {
                $hero->image = $image;
                $hero->save();
            }
        }

        return redirect()->back()->with('success', 'Page header images have been updated.');
    }
}
