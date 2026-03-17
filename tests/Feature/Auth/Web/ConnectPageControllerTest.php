<?php

namespace Tests\Feature\Auth\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ConnectPageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_connect_page(): void
    {
        $response = $this->get(route('connect.index'));

        $response->assertOk();
    }

}