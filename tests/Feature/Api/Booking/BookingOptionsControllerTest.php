<?php

namespace Tests\Feature\Api\Booking;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BookingOptionsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
	public function it_returns_active_units_for_selected_branch(): void
    {
        $branch = Branch::factory()->create();

        $activeUnit = Unit::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => true,
        ]);

        Unit::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => false,
        ]);

        $response = $this->getJson('/api/booking-options/units?branch_id=' . $branch->id);

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $activeUnit->id,
            ]);
    }

    /** @test */
	public function it_does_not_return_units_from_other_branches(): void
    {
        $branch = Branch::factory()->create();
        $otherBranch = Branch::factory()->create();

        Unit::factory()->create([
            'branch_id' => $otherBranch->id,
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/booking-options/units?branch_id=' . $branch->id);

        $response->assertOk()
            ->assertJsonCount(0, 'data');
    }

    /** @test */
	public function it_returns_activities_assigned_to_selected_unit(): void
    {
        $unit = Unit::factory()->create();

        $activity = Activity::factory()->create([
            'is_active' => true,
        ]);

        $activity->units()->attach($unit->id);

        $response = $this->getJson('/api/booking-options/activities?unit_id=' . $unit->id);

        $response->assertOk()
            ->assertJsonFragment([
                'id' => $activity->id,
            ]);
    }

    /** @test */
	public function it_does_not_return_unassigned_activities(): void
    {
        $unit = Unit::factory()->create();

        Activity::factory()->create([
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/booking-options/activities?unit_id=' . $unit->id);

        $response->assertOk()
            ->assertJsonCount(0, 'data');
    }

    /** @test */
	public function it_returns_available_slots_for_valid_booking_combination(): void
    {
        $branch = Branch::factory()->create();

        $unit = Unit::factory()->create([
            'branch_id' => $branch->id,
            'is_active' => true,
        ]);

        $activity = Activity::factory()->create([
            'duration_minutes' => 60,
            'buffer_before_minutes' => 0,
            'buffer_after_minutes' => 0,
            'is_active' => true,
        ]);

        $activity->units()->attach($unit->id);

        $response = $this->getJson('/api/booking-options/slots?' . http_build_query([
            'branch_id' => $branch->id,
            'unit_id' => $unit->id,
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