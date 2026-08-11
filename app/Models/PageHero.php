<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PageHero extends Model
{
    protected $fillable = ['page_key', 'image'];

    public static function catalog(): array
    {
        return [
            'about' => [
                'label' => 'About',
                'hint' => 'Background / About page',
                'routes' => ['backgroundDetails'],
            ],
            'team' => [
                'label' => 'Our Team',
                'hint' => 'Team page',
                'routes' => ['team'],
            ],
            'testimonials' => [
                'label' => 'Testimonials',
                'hint' => 'Testimonials listing and detail',
                'routes' => ['testimonials', 'testimony'],
            ],
            'programs' => [
                'label' => 'Programs',
                'hint' => 'Programs listing and program detail',
                'routes' => ['showPrograms', 'singleProgram'],
            ],
            'activities' => [
                'label' => 'Activities',
                'hint' => 'Updates listing and article',
                'routes' => ['posts', 'postSingle'],
            ],
            'impact' => [
                'label' => 'Our Impact',
                'hint' => 'Impact page',
                'routes' => ['impacts'],
            ],
            'gallery' => [
                'label' => 'Gallery',
                'hint' => 'Gallery page',
                'routes' => ['gallery'],
            ],
            'contact' => [
                'label' => 'Contact',
                'hint' => 'Contact page',
                'routes' => ['contacts'],
            ],
            'campaigns' => [
                'label' => 'Campaigns',
                'hint' => 'Campaigns listing and detail',
                'routes' => ['campaigns', 'campaign'],
            ],
        ];
    }

    public static function keyFromRoute(?string $routeName): ?string
    {
        if (!$routeName) {
            return null;
        }

        foreach (static::catalog() as $key => $page) {
            if (in_array($routeName, $page['routes'], true)) {
                return $key;
            }
        }

        return null;
    }

    public static function ensurePages(): Collection
    {
        foreach (array_keys(static::catalog()) as $key) {
            static::firstOrCreate(['page_key' => $key]);
        }

        return static::query()->get()->keyBy('page_key');
    }
}
