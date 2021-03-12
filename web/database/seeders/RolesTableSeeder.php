<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'User',
        ]);

        DB::table('roles')->insert([
            'id' => '25',
            'name' => 'Admin',
        ]);

    }

}
