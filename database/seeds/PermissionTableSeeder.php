<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'permission' => 'deadlinemanager'
        ]);

        Permission::create([
            'permission' => 'adminpanel'
        ]);

        DB::unprepared('INSERT INTO permission_role VALUES(1, 1)');
        DB::unprepared('INSERT INTO permission_role VALUES(2, 2)');
        $this->command->info('Permission_role table seeded');
    }
}
