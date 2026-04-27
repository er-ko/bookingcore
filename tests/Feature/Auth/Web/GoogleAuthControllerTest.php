<?php

namespace Tests\Feature\Auth\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Tests\TestCase;

final class GoogleAuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_is_redirected_to_google_oauth(): void
    {
        $response = $this->get(route('connect.google.redirect'));

        $response->assertRedirect();
    }

    /** @test */
    public function test_callback_creates_user_and_logs_in(): void
    {
        $socialiteUser = new SocialiteUser();

        $socialiteUser->map([
            'id' => 'google-123',
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'avatar' => 'https://avatar.test/avatar.jpg',
        ]);

        $socialiteUser->token = 'fake-token';
        $socialiteUser->refreshToken = 'fake-refresh-token';
        $socialiteUser->expiresIn = 3600;

        Socialite::shouldReceive('driver')
            ->with('google')
            ->andReturnSelf();

        Socialite::shouldReceive('user')
            ->andReturn($socialiteUser);

        $response = $this->get(route('connect.google.callback'));

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@email.com',
        ]);

        $this->assertDatabaseHas('connected_accounts', [
            'provider' => 'google',
            'provider_user_id' => 'google-123',
        ]);

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseCount('connected_accounts', 1);

        $response->assertRedirect(route('dashboard.index'));
    }
}
