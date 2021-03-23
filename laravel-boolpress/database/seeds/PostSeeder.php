<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15 ; $i++) { 
            $NewPost = new Post();
            $NewPost->title = $faker->sentence(5);
            $NewPost->content = $faker->paragraph(2);
            $NewPost->slug = Str::of($NewPost->title);
            $NewPost->save();
        }
    }
}
