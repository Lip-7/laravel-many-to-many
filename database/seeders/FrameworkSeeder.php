<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frameworks = config('frameworks');
        foreach ($frameworks as $framework) {
            $newFramework = new Framework();
            $newFramework->name = $framework;
            $newFramework->slug = Str::slug($framework, '-');
            $newFramework->save();
        }
    }
}
