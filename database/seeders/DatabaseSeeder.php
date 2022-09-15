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

        $admin_role = \App\Models\Role::factory()->create([
            'name' => 'Admin'
        ]);

        $admin_users = \App\Models\User::factory(2)->create();
        foreach ($admin_users as $user) {
            $user->roles()->attach($admin_role);
        }

        $client_role = \App\Models\Role::factory()->create([
            'name' => 'Cliente'
        ]);

        $client_users = \App\Models\User::factory(200)->create();
        foreach ($client_users as $user) {
            $user->roles()->attach($client_role);
        }

        $manager_role = \App\Models\Role::factory()->create([
            'name' => 'Manager'
        ]);

        $manager_users = \App\Models\User::factory(12)->create();
        foreach ($manager_users as $user) {
            $user->roles()->attach($manager_role);
        }

        $vip_role = \App\Models\Role::factory()->create([
            'name' => 'Vip'
        ]);

        $vip_users = \App\Models\User::factory(40)->create();
        foreach ($vip_users as $user) {
            $user->roles()->attach($vip_role);
            $user->roles()->attach($client_role);
        }

        //Produtcts and Orders

        \App\Models\Product::factory(30)->create();

        $users = \App\Models\Role::where('name', 'Cliente')->get()->first()->users;

        foreach ($users as $client) {
            $order_amount = random_int(0, 4); //Numero de pedidos de 0 a 4 asignaremos aleatoriamente
            for ($i = 0; $i < $order_amount; $i++) {
                $order = \App\Models\Order::factory()->create([
                    'user_id' => $client->id,
                ]);

                $products = \App\Models\Product::inRandomOrder()->limit(random_int(1,10))->get(); //Insertar cantidad aleatoria de productos en las ordenes
                foreach ($products as $product){
                    $units = random_int(1,5);
                    $order->products()->attach($product, ['units' => $units]); //Tb pasamos cantidad de productos
                    $order->total_price += $product->price * $units;

                }
                $order->save();
            }
        }
    }
}
