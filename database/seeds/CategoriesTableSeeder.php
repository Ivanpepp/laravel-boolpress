<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{

    


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $categoryNames = ['HTML','PHP','JS','MySQL','LARAVEL','VueJS'];
         
            foreach($categoryNames as $name){
                $category = new Category();
                $category->name = $name;

                $category->slug = Str::slug($name,'-');

                $category->save();
            }
    }
}