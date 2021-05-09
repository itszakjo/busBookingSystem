<?php

namespace Tests\Feature;

use App\Models\Routes;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TripServiceTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function book_seat_test()
    {

        $response = $this->json('POST', '/api/book_seat', [
            'pickup_point' => 1,
            'drop_point' => 2,
            'seat_id' => 2,
            'trip_id' => 1,
        ]);

        $response->assertStatus(200);
    }
}
