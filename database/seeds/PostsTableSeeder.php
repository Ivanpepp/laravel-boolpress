<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for($i=0; $i<50; $i++){
            $newPost = new Post();

            $newPost->title = $faker->words(5, true);
            $newPost->author = $faker->name();
            $newPost->content = $faker->paragraphs(4, true);
            $newPost->url = $faker->imageUrl();
            $newPost->date = $faker->dateTime();

            $newPost->slug= Str::slug($newPost->title, '-');
            $newPost->save();

        }
    }
}
