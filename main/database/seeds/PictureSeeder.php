<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Picture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Picture::class, 80)
        ->make()
        ->each(function($pic){
            $proj = Project::inRandomOrder() -> first();
            $pic -> project() -> associate($proj);
            $pic -> save();
        });
    }
}
