<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Seats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $pickup_point = $request->get('pickup_point');
        $drop_point = $request->get('drop_point');
        $trip_id = $request->get('trip_id');

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

        echo $output;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function edit(Seats $seats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seats $seats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seats $seats)
    {
        //
    }
}
