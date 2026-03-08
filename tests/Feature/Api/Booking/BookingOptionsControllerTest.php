<?php

namespace Tests\Feature\Api\Booking;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BookingOptionsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
	public function it_returns_active_resources_for_selected_branch(): void
    {
        $branch = Branch::factory()->create();

        $activeResource = Resource::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => true,
        ]);

        Resource::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => false,
        ]);

        $response = $this->getJson('/api/booking-options/resources?branch_id=' . $branch->id);

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $activeResource->id,
            ]);
    }

    /** @test */
	public function it_does_not_return_resources_from_other_branches(): void
    {
        $branch = Branch::factory()->create();
        $otherBranch = Branch::factory()->create();

        Resource::factory()->create([
            'branch_id' => $otherBranch->id,
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/booking-options/resources?branch_id=' . $branch->id);

        $response->assertOk()
            ->assertJsonCount(0, 'data');
    }

    /** @test */
	public function it_returns_activities_assigned_to_selected_resource(): void
    {
        $resource = Resource::factory()->create();

        $activity = Activity::factory()->create([
            'is_active' => true,
        ]);

        $activity->resources()->attach($resource->id);

        $response = $this->getJson('/api/booking-options/activities?resource_id=' . $resource->id);

        $response->assertOk()
            ->assertJsonFragment([
                'id' => $activity->id,
            ]);
    }

    /** @test */
	public function it_does_not_return_unassigned_activities(): void
    {
        $resource = Resource::factory()->create();

        Activity::factory()->create([
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/booking-options/activities?resource_id=' . $resource->id);

        $response->assertOk()
            ->assertJsonCount(0, 'data');
    }

    /** @test */
	public function it_returns_available_slots_for_valid_booking_combination(): void
    {
        $branch = Branch::factory()->create();

        $resource = Resource::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => true,
        ]);

        $activity = Activity::factory()->create([
            'duration_minutes' => 60,
            'buffer_before_minutes' => 0,
            'buffer_after_minutes' => 0,
            'is_active' => true,
        ]);

        $activity->resources()->attach($resource->id);

        $response = $this->getJson('/api/booking-options/slots?' . http_build_query([
            'branch_id' => $branch->id,
            'resource_id' => $resource->id,
            'activity_id' => $activity->id,
            'date' => now()->format('Y-m-d'),
        ]));

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'items',
                    'is_empty',
                ],
            ]);
    }
}