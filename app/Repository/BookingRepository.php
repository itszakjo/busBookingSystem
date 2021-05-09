<?php namespace App\Repository;

use App\Models\Bookings;
use Illuminate\Support\Facades\DB;

class BookingRepository implements BookingRepositoryInterface
{
    public function book($seatId, $pickup_point, $drop_point, $tripId)
    {

        return Bookings::create([
                'seat_id'=>$seatId ,
                'pickup_point'=> $pickup_point,
                'drop_point'=>$drop_point ,
                'trip_id'=>$tripId

            ]);
    }

}
