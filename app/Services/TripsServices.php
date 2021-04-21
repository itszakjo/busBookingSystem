<?php

namespace App\Services;


use App\Models\BookedSeats;
use App\Models\Bookings;
use App\Models\Seats;
use App\Models\Trips;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TripsServices
{

    public function search($start_point, $end_point,$date){


        return $data = Trips::select('trips.*' , 'routes.start_point', 'routes.end_point','routes.stop_points')
            ->join('routes','trips.route','=','routes.id')
            ->where('routes.start_point' , $start_point)
            ->where('routes.end_point' , $end_point)
            ->get();

    }

    public function bookTrip($name , $trip , $pickup_point, $drop_point, $seats, $total_price){

        if(Bookings::create(
            [
                'name' => $name ,
                'trip' => $trip ,
                'pickup_point' => $pickup_point ,
                'drop_point' => $drop_point ,
                'seats' => $seats ,
                'booking_date' => Carbon::today()->toDateString(),
                'total_price' => $total_price ,

            ]
        )){

            $seats =  explode(",",$seats);
            for($i=0; $i<count($seats)-1;$i++){

                $new_str = str_replace(' ', '', $seats[$i]);
                if(BookedSeats::create([
                    'ref_seat'=>$new_str  ,
                    'ref_trip'=>$trip ,
                    'ref_pickup_point'=>$pickup_point,
                    'ref_drop_point'=> $drop_point
                ])){

                }else{

                    return response()->json(['status' => 400 , 'message' => 'Error']);
                }

            }

            return response()->json(['status' => 200 , 'message' => 'Booked Successfully !']);

        }else{

            return response()->json(['status' => 400 , 'message' => 'Error !']);
        }
    }

    public function getTripAvailableSeatsForWeb($pickup_point,$drop_point,$trip_id){

        $seatsCollection = Seats::get();
        $output = "";
        foreach($seatsCollection->chunk(4) as $seats) {

            $output .= ' <div class="seatRow">';

            foreach ($seats as $row) {

                $output .= '<div style="margin:2px;cursor:pointer" id="'.$row->name.'" title="" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatNumber';

                // get all booked routes for this seat on this trip
                $seatRoutes = DB::table('booked_seats')
                    ->where([
                        ['ref_seat', $row->name],
                        ['ref_trip', $trip_id],
                    ])->get();

                //if the seat is booked in any route for this trip
                if($seatRoutes->count()>0){

                    // loop through the routes
                    foreach ($seatRoutes as $seatRoute){

                        $start_point = $seatRoute->ref_pickup_point; // 4
                        $end_point = $seatRoute->ref_drop_point; // 7

                        if(($pickup_point < $start_point && $pickup_point < $end_point &&
                                $drop_point <= $start_point && $drop_point < $end_point) ||
                            ($pickup_point > $start_point && $pickup_point >= $end_point &&
                                $drop_point > $start_point && $drop_point > $end_point)){

                            $output .=" available";

                        }else{

                            $output .=" seatUnavailable";
                        }


                    }

                }

                $output .='">'.$row->name.'</div>';
            }

            $output .= '</div>';

        }

        return $output;

    }

    public function getTripAvailableSeatsForAPI($pickup_point,$drop_point ){

        $seats = Seats::get();

        foreach ($seats as $row) {

            $checkSeat = BookedSeats::where('ref_pickup_point' , $pickup_point)
                ->where('ref_drop_point' ,$drop_point )
                ->where('ref_seat' ,$row->name)
                ->first();

            // if the seat is not booked , add it
            if($checkSeat == null){
                $data[] =[
                    'id' => $row->id,
                    'name' => $row->name,
                ];
            }

        }

        return response()->json(['status' => 200, 'data' => $data]);
    }

}