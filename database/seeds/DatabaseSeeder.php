<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'id' => 1,
            'name' => 'Guest',
            'email' => '',
            'password' => '',
            'role' => 'guest'
        ]);
        User::create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '123456',
            'role' => 'admin'
        ]);
        Ingredient::create([
            'id' => 1,
            'name' => 'Sucre',
            'stock' => 0,
        ]);.
    }
}
