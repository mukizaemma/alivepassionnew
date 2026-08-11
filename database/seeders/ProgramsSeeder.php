<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProgramsSeeder extends Seeder
{
    public function run()
    {
        $order = 1;
        $hasExtras = Schema::hasColumn('programs', 'excerpt');

        foreach (Program::catalog() as $slug => $item) {
            $program = $this->findExisting($slug, $item['keywords']);

            $payload = [
                'title' => $item['title'],
                'slug' => $slug,
                'description' => $item['description'],
            ];

            if ($hasExtras) {
                $payload['excerpt'] = $item['excerpt'];
                $payload['icon'] = $item['icon'];
                $payload['sort_order'] = $order;
            }

            if ($program) {
                $program->fill($payload);
                $program->save();
            } else {
                $payload['status'] = 'Active';
                Program::create($payload);
            }

            $order++;
        }
    }

    protected function findExisting(string $slug, array $keywords): ?Program
    {
        $program = Program::where('slug', $slug)->first();
        if ($program) {
            return $program;
        }

        foreach ($keywords as $keyword) {
            $program = Program::where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%')
                    ->orWhere('slug', 'like', '%'.Str::slug($keyword).'%');
            })->first();

            if ($program) {
                return $program;
            }
        }

        return null;
    }
}
