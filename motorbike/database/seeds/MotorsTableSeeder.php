<?php

use Illuminate\Database\Seeder;
use App\Entities\Motor;

class MotorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Motor::class)->create();
    }
}
