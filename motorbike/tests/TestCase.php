<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;
use App\Entities\Admin;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected $faker;

    protected $admin;

    public function setUp()
    {
        parent::setUp();

        $this->faker = Faker::create();
        $this->admin = factory(Admin::class)->create();

        $this->seed();
    }

    public function tearDown()
    {
        $this->artisan('migrate:reset');

        parent::tearDown();
    }
}
