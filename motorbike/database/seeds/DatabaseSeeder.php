<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(MotorsTableSeeder::class);
    }
}
