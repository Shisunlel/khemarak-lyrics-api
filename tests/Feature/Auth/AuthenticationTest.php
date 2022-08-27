<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_not_authenticate_without_admin()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'name' => $user->name,
            'password' => 'password',
        ]);

        $response->assertForbidden();
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'name' => $user->name,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_authenticate_when_login_as_admin(){
        $user = User::factory()->create([
            'is_admin' => 1
        ]);

        $response = $this->post('/login', [
            'name' => $user->name,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(RouteServiceProvider::HOME);

    }
}
