<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frameworks = config('frameworks');
        $projects = config('projects');
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->name = $project['name'];
            $newProject->gitUrl = $project['gitUrl'];
            $newProject->description = $project['description'];
            $newProject->framework_id = (array_search($project['framework'], $frameworks) + 1);
            //$newProject->framework = $project['framework'];
            $newProject->tecnologies = $project['tecnologies'];
            $newProject->slug = Str::slug($project['name'], '-');
            $newProject->save();
        }
    }
}
