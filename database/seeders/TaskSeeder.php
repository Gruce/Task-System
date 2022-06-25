<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::get();

        foreach ($projects as $project)
            for ($i = 1; $i <= 20; $i++)
                Task::create([
                    'title' => 'title ' . $i . ' - ' . $project->title,
                    'project_id' => $project->id,
                    'description' => 'description',
                    'state' => rand(1, 3),
                    'start_at' => date('Y-m-d'),
                    'end_at' => date('Y-m-d'),
                ]);
    }
}
