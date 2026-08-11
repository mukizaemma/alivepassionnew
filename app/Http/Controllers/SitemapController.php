<?php

namespace App\Http\Controllers;

use App\Models\Campain;
use App\Models\News;
use App\Models\Program;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => route('home'), 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => route('backgroundDetails'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('team'), 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => route('showPrograms'), 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['loc' => route('posts'), 'changefreq' => 'weekly', 'priority' => '0.8'],
            ['loc' => route('impacts'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('gallery'), 'changefreq' => 'weekly', 'priority' => '0.6'],
            ['loc' => route('contacts'), 'changefreq' => 'yearly', 'priority' => '0.5'],
            ['loc' => route('testimonials'), 'changefreq' => 'monthly', 'priority' => '0.5'],
            ['loc' => route('campaigns'), 'changefreq' => 'weekly', 'priority' => '0.7'],
        ];

        foreach (Program::query()->orderBy('id')->get() as $program) {
            $urls[] = [
                'loc' => route('singleProgram', $program->slug),
                'lastmod' => optional($program->updated_at)->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        foreach (News::latest()->get() as $post) {
            if (empty($post->slug)) {
                continue;
            }
            $urls[] = [
                'loc' => route('postSingle', $post->slug),
                'lastmod' => optional($post->updated_at)->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        foreach (Campain::latest()->get() as $campaign) {
            if (empty($campaign->slug)) {
                continue;
            }
            $urls[] = [
                'loc' => route('campaign', $campaign->slug),
                'lastmod' => optional($campaign->updated_at)->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $sitemap = url('/sitemap.xml');
        $body = <<<TXT
User-agent: *
Allow: /
Disallow: /admin
Disallow: /admin/
Disallow: /login
Disallow: /register
Disallow: /dashboard
Disallow: /forgot-password
Disallow: /reset-password
Disallow: /user/

Sitemap: {$sitemap}

TXT;

        return response($body, 200)->header('Content-Type', 'text/plain');
    }
}
