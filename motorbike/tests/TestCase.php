<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use App\Entities\Admin;
use App\Entities\Motor;
use Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, WithFaker;

    protected $admin;
    protected $motor;

    public function setUp()
    {
        parent::setUp();

        $this->admin = factory(Admin::class)->create();
        $this->motor = factory(Motor::class)->create();
    }

    public function tearDown()
    {
        $this->artisan('migrate:reset');
        Storage::disk('public')->deleteDirectory('motors');
        parent::tearDown();
    }
}
