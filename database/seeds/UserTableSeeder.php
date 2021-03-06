<?php

use Illuminate\Database\Seeder;
use delivery\Models\User;
use delivery\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      factory(User::class)->create([
          'name' => 'User',
          'email' => 'user@email.com',
          'password' => bcrypt('user'),
          'remember_token' => str_random(10),

      ])->client()->save(factory(Client::class)->make());

      factory(User::class)->create([
          'name' => 'Admin',
          'email' => 'admin@email.com',
          'password' => bcrypt('admin'),
          'role' => 'admin',
          'remember_token' => str_random(10),

      ])->client()->save(factory(Client::class)->make());;

      factory(User::class, 4)->create([
          'role' => 'deliveryman',

      ]);

        //cria 10 usuarios
        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
