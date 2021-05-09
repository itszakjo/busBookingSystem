<?php

namespace App\Services;

interface TripServiceInterface
{
    public function getTripAvailableSeats($trip_id, $pickup_point, $drop_point);
    public function bookSeat($seatId, $pickup_point, $drop_point, $trip_id);
}
