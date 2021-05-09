<?php

namespace App\Repository;

interface TripRepositoryInterface
{

    public function getTripStations($id);

    public function getTripSeatsWithBookings($id);

}
