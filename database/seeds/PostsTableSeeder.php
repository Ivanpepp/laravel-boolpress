<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\User;

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

        $category_ids = Category::pluck('id')->toArray();
       /*  $tag_ids = Tag::pluck('id')->toArray(); */
        $user_ids = User::pluck('id')->toArray();
        //
        for($i=0; $i<50; $i++){
            $newPost = new Post();

            $newPost->title = $faker->words(5, true);
            $newPost->author = Arr::random($user_ids);
            $newPost->content = $faker->paragraphs(4, true);
            $newPost->url = $faker->imageUrl();
            $newPost->date = $faker->dateTime();

            $newPost->category_id = Arr::random($category_ids);


            $newPost->slug= Str::slug($newPost->title, '-');
            $newPost->save();

           /*  $newPost->tags()->attach($) */
        }
    }
}