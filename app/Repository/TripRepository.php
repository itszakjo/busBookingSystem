<?php namespace App\Repository;

use App\Models\Trips;

class TripRepository implements TripRepositoryInterface
{

    public function getTripStations($id)
    {
        $trips = Trips::with('route.stations')->find(2);
        if ($trips != null) {
            $trips->toArray();
        } else {
            $trips = [];
        }

        return $trips;
    }

    public function getTripSeatsWithBookings($id)
    {
        $trips = Trips::with('bus.seats.bookings')->find($id);
        if ($trips != null) {
            $trips->toArray();
        } else {
            $trips = [];
        }

        return $trips;
    }


}
