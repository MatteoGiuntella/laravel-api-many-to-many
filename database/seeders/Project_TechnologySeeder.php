<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Str;

class Project_TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $technology = Technology::all()->pluck('id');
        // $technology->id = Technology::inRandomOrder()->first()->id;
        // $project->project_id = Project::inRandomOrder()->first()->id;
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id')->toArray();


        if ($projects->isEmpty() || empty($technologies)) {
            return;
        }

        // Per ogni progetto, associa alcune tecnologie in modo casuale
        $projects->each(function ($project) use ($technologies) {
            shuffle($technologies); 
            $technologiesForProject = array_slice($technologies, 0, rand(1, count($technologies)));
            $project->technologies()->attach($technologiesForProject); 
        });
    }
}
