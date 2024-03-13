<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Controller\ProjectController;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for( $i = 0; $i < 25 ; $i++){
            $project = new Project();
            $project->url = fake()->url();
            $project->title= fake()->domainName();
            $project->slug = Str::slug($project->title);
            $project->date = fake()->dateTime();
            $project->description = fake()->paragraph();
            $project->type_id = Type::InRandomOrder()->first()->id;
            $project->save();
        }
       
    }
}
