<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 12) -> create();
    }
}
