<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table =  DB::table('user_status');
        $table->insert(
            ['status' => 'active']
        );

        $table->insert(
            ['status' => 'inactive']
        );

        $table->insert(
            ['status' => 'block']
        );
    }
}
