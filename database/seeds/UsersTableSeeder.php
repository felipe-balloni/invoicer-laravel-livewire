<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'      => 'Felipe Balloni Ferreira',
            'email'     => 'felipe.balloni@hotmail.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
