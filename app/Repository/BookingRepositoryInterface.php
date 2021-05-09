<?php

namespace App\Repository;

interface BookingRepositoryInterface
{

    public function book($seat_id, $pickup_point, $drop_point, $tripId);

}
