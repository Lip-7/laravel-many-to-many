<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Project_Technology;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Project_TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $projects = Project::all();
        foreach ($projects as $project) {
            $newConnection = new Project_Technology;
            $newConnection->project_id = $project->id;
            $techArray = explode(', ', $project->tecnologies);
            foreach ($techArray as $tech) {
                $realtech = Technology::where('name', $tech)->first();
                dd($realtech);
                $newConnection->technology_id = $realtech->id;
                $newConnection->save();
            }

        } */
        $projects = Project::all();
        foreach ($projects as $project) {
            $techArray = explode(', ', $project->tecnologies);
            $techIdArray = [];
            foreach ($techArray as $tech) {
                $realTech = Technology::where('name', $tech)->first();
                $techIdArray[] = $realTech->id;
            }
            $project->technologies()->attach($techIdArray);


        }


    }
}
