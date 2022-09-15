<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Product::factory(30)->create();

        $admin_role = \App\Models\Role::factory()->create([
            'name' => 'Admin'
        ]);

        $admin_users = \App\Models\User::factory(2)->create();
        foreach ($admin_users as $user){
            $user->roles()->attach($admin_role);
        }

        $client_role = \App\Models\Role::factory()->create([
            'name' => 'Client'
        ]);

        $client_users = \App\Models\User::factory(200)->create();
        foreach ($client_users as $user){
            $user->roles()->attach($client_role);
        }

        $manager_role = \App\Models\Role::factory()->create([
            'name' => 'Manager'
        ]);

        $manager_users = \App\Models\User::factory(12)->create();
        foreach ($manager_users as $user){
            $user->roles()->attach($manager_role);
        }

        $vip_role = \App\Models\Role::factory()->create([
            'name' => 'Vip'
        ]);

        $vip_users = \App\Models\User::factory(40)->create();
        foreach ($vip_users as $user){
            $user->roles()->attach($vip_role);
            $user->roles()->attach($client_role);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
