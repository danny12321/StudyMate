<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'student'
        ]);

        Role::create([
            'role' => 'admin'
        ]);

        DB::unprepared('INSERT INTO role_user VALUES(1, 1)');
        DB::unprepared('INSERT INTO role_user VALUES(2, 2)');
        $this->command->info('Role_user table seeded');
    }
}
