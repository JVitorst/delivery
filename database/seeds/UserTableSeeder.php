<?php

use Illuminate\Database\Seeder;
use delivery\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cria 10 usuarios
        factory(User::class, 10)->create();
    }
}
