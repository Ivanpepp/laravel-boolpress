<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        // create a role list

        $roleList = ['Dio','Amministratore','Editore','Redattore', 'Lettore'];

        for($i=1; $i<=5; $i++)
        {
            $newRole = new Role();
            $newRole->rank = $i ;
            $newRole->name = $roleList[$i-1];
            $newRole->color = $faker->safeHexColor();
            $newRole->save();
        }

    }
}
