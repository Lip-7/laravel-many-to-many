<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techs = config('technologies');
        foreach ($techs as $tech) {
            $newtech = new Technology();
            $newtech->name = $tech;
            $newtech->slug = Str::slug($tech);
            $newtech->save();
        }
    }
}
