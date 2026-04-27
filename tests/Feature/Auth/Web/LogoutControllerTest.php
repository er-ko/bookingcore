<?php

namespace Tests\Feature\Auth\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class LogoutControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('logout'));

        $response->assertRedirect(route('home'));

        $this->assertGuest();
    }

    /** @test */
    public function test_guest_is_redirected_when_trying_to_logout(): void
    {
        $response = $this->post(route('logout'));

        $response->assertRedirect(route('connect.index'));
    }
}
