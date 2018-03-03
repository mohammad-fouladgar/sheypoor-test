<?php

use Illuminate\Database\Seeder;
use App\Entities\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Admin::class)->create();
    }
}
