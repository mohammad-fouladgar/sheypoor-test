<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class AuthAdminFeatureTest extends TestCase
{
    /**
     * Return login route as a string.
     *
     * @return string
     */
    protected function getLoginRoute()
    {
        return route('login');
    }

    /**
     * Return a response of get login page.
     *
     * @return $this
     */
    protected function visitGetLoginPage()
    {
        return $this->get($this->getLoginRoute());
    }

    /**
     * Go to the admin login route.
     *
     * @test
     */
    public function canGoToTheAdminLoginRoute()
    {
        $response = $this->visitGetLoginPage();

        $response
            ->assertStatus(200)
            ->assertSuccessful();
    }

    /**
     * If admin logged in,redirect to the home page.
     *
     * @test
     */
    public function canBeRedirectedIfAdminIsLogged()
    {
        $response = $this->actingAs($this->admin)->visitGetLoginPage();

        $response
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }

    /**
     * See login elements in the login page.
     *
     * @test
     */
    public function canSeeElementsInAdminloginPage()
    {
        $response = $this->visitGetLoginPage();

        $response
            ->assertSeeText('Admin Login')
            ->assertSeeText('E-Mail')
            ->assertSeeText('Password')
            ->assertSeeText('Login To Dashboard');
    }

    /**
     * Check validation error for login admin.
     *
     * @test
     */
    public function canSeeValidationErrorsIfInvalidCredentials()
    {
        $data = [
            'email' => 'test@test.com',
            'password' => '123456',
        ];

        $response = $this->post('/login', $data);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'email' => trans('auth.failed'),
            ]);
    }

    /**
     * Admin can login to dashboard.
     *
     * @test
     */
    public function canLoginToAdminDashboard()
    {
        $data = [
            'email' => $this->admin->email,
            'password' => 'secret',
        ];

        $response = $this->post('/login', $data);

        $response
        ->assertStatus(302)
        ->assertRedirect(route('home'));

        $this->get(route('home'))
             ->assertSee('You are logged in!');
    }

    /**
     * Redirect to login if admin is guest.
     *
     * @test
     */
    public function canRedirectToLoginPageIfAdminIsGuest()
    {
        $response = $this->get(route('home'));

        $response
            ->assertStatus(302)
            ->assertRedirect($this->getLoginRoute());
    }

    /**
     * Admin can logout from dashboard and redirect to main page.
     *
     * @test
     */
    public function canAdminlogoutFromDashboard()
    {
        $response = $this->actingAs($this->admin)->post('/logout');

        $response
            ->assertStatus(302)
            ->assertRedirect('/');
    }
}
