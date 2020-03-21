<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => encrypt('Frans Bauer'),
            'email' => encrypt('frans@bauer.com'),
            'password' => Hash::make('test')
        ]);

        User::create([
            'name' => encrypt('Maradonnie'),
            'email' => encrypt('mara@donnie.com'),
            'password' => Hash::make('test')
        ]);
    }
}
