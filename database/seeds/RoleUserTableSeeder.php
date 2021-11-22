<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
use Illuminate\Support\Arr;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $role_ids = Role::pluck('id')->toArray();

        foreach($users as $user)
        {
            $user->roles()->attach(Arr::random($role_ids)); 
        }

    }
}
