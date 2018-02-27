<?php

namespace Tests\Unit\Admins;

use Tests\TestCase;

// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminsUnitTest extends TestCase
{
    private $validCredentials = [];
    private $inValidCredentials = [];

    public function setUp()
    {
        parent::setUp();

        $this->validCredentials = [
            'email' => $this->admin->email,
            'password' => 'secret',
        ];

        $this->inValidCredentials = [
            'email' => $this->admin->email,
            'password' => 'invalid secret',
        ];
    }

    /**
     * check admin login.
     *
     * @test
     */
    public function canAdmminLogin()
    {
        $this->assertCredentials($this->validCredentials);
    }

    /**
     * admin can not login if invalid credentials.
     *
     * @test
     */
    public function canNotAdmminLogin()
    {
        $this->assertInvalidCredentials($this->inValidCredentials);
    }
}
